<?php

namespace App\Http\Controllers;

use App\Models\CollectionModel;
use App\Models\CollectionItemModel;
use App\Models\CampaignModel;
use App\Models\ContactModel;
use App\Models\CampaignSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class CampaignController extends Controller
{
    public function index($id)
    {
        $collection = CollectionModel::findOrFail($id);
        $lists = CampaignModel::with(['list', 'collection'])->where('coll_id', $id)->orderBy('id', 'desc')->get();
        $contacts = ContactModel::where('created_by', Auth::id())->get();
        return view('collection.campaign.index', compact('lists', 'collection', 'contacts'));
    }
    public function save(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'list_id' => 'required|exists:tbl_contact,id',
            // 'start_date' => 'required|date',
            // 'time_of_day' => 'required|date_format:H:i',
            'cost_per_contact' => 'required|numeric|min:0',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $contact_count = $request->total_contacts;
        $total_cost = $contact_count * $request->cost_per_contact;
        if ($request->id) {
            $campaign = CampaignModel::findOrFail($request->id);
            $msg = 'updated';
        } else {
            $campaign = new CampaignModel();
            $campaign->campaign_id = $this->generateCampaignId();
            $msg = 'created';
        }
        $campaign->coll_id = $id;
        $campaign->title = $request->title;
        $campaign->list_id = $request->list_id;
        $campaign->total_contacts = $contact_count;
        $campaign->cost_per_contact = $request->cost_per_contact;
        $campaign->total_cost = $total_cost;
        $campaign->start_date = $request->start_date ? date('Y-m-d', strtotime($request->start_date)) : date('Y-m-d');
        
        $campaign->status = '0'; // Active by default
        $campaign->created_by = Auth::id();
        $campaign->save();

        CampaignSchedule::where('campaign_id', $campaign->id)->delete();
        $items = CollectionItemModel::where('collection_id', $id)->get();
        $startDate = $campaign->start_date;
        if($startDate){
            foreach ($items as $item) {
                $startDate = date('Y-m-d', strtotime($startDate . ' + ' . $item->schedule_day . ' days'));
                $schedule = new CampaignSchedule();
                $schedule->campaign_id = $campaign->id;
                $schedule->type = $item->postal_type == '1' ? 'email' : 'gift';
                $schedule->item_id = $item->id;
                $schedule->start_date = $startDate;
                $schedule->schedule_time = $item->schedule_time;
                $schedule->status = 'pending';
                $schedule->save();
            }
            $totalDays = CollectionItemModel::where('collection_id', $id)->sum('schedule_day') ?? 0;
            $endDate = date('Y-m-d', strtotime($startDate . ' + ' . $totalDays . ' days'));
            CampaignSchedule::where('campaign_id', $campaign->id)->update(['end_date' => $endDate]);
            $msg .= ' & scheduled';
        }

        return redirect()->back()->with('success', 'Campaign '.$msg. ' successfully!');
    }
    function generateCampaignId()
    {
        $campID = 'CMP' . (int) str_replace('CMP', '', rand(100000, 999999));
        $lastCampaign = CampaignModel::where('campaign_id', $campID)->exists();
        if ($lastCampaign) {
            $this->generateCampaignId();
        }
        return $campID;
    }
    public function update_status($coll_id, Request $request)
    {
        $campaign = CampaignModel::findOrFail($request->id);
        $campaign->status = $request->status;
        $campaign->save();
        if($request->status == '1') {
            CampaignSchedule::where('campaign_id', $campaign->id)->update(['status' => 'processing']);
        } else {
            CampaignSchedule::where('campaign_id', $campaign->id)->update(['status' => 'pending']);
        }
        return redirect()->back()->with('success', 'Campaign status updated successfully');
    }
    public function get_contact_count(Request $request)
    {
        $list_id = $request->id;
        $user_count = DB::table('tbl_user_list')
            ->join('users', 'users.id', '=', 'tbl_user_list.user_id')
            ->where('tbl_user_list.list_id', $list_id)
            ->where([
                'users.status' => 1,
                'users.agent_id' => Auth::id()
            ])
            ->count();
        return response()->json(['status' => true, 'count' => $user_count]);
    }
    public function delete($coll_id, $camp_id)
    {
        $campaign = CampaignModel::findOrFail($camp_id);
        $campaign->delete();
        return redirect()->back()->with('success', 'Campaign deleted successfully');
    }
    public function report($coll_id, $camp_id)
    {
        $collection = CollectionModel::withCount(['emails', 'gifts'])->findOrFail($coll_id);
        $campaign = CampaignModel::withCount('list')->findOrFail($camp_id);
        $contact = ContactModel::where('id', $campaign->list_id)->first();
        $users = DB::table('tbl_user_list')
            ->join('users', 'users.id', '=', 'tbl_user_list.user_id')
            ->where('tbl_user_list.list_id', $campaign->list_id)
            ->where(['users.status' => 1, 'users.agent_id' => Auth::id()])->select('users.*')->get();
            // dd($users);
        // dd($campaign, $collection);
        // For demonstration, we'll just return the campaign details.
        // In a real application, you'd likely want to gather more detailed statistics.
        return view('collection.campaign.report', compact('campaign', 'collection', 'contact', 'users'));
    }
}
