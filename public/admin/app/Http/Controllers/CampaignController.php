<?php

namespace App\Http\Controllers;

use App\Models\CollectionModel;
use App\Models\CampaignModel;
use App\Models\ContactModel;
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
        $collection = CollectionModel::findOrFail($id);
        $contact_count = $request->total_contacts;
        $total_cost = $contact_count * $request->cost_per_contact;
        if ($request->id) {
            $campaign = CampaignModel::findOrFail($request->id);
        } else {
            $campaign = new CampaignModel();
            $campaign->campaign_id = $this->generateCampaignId();
        }
        $campaign->coll_id = $id;
        $campaign->title = $request->title;
        $campaign->list_id = $request->list_id;
        $campaign->total_contacts = $contact_count;
        $campaign->cost_per_contact = $request->cost_per_contact;
        $campaign->total_cost = $total_cost;
        if($request->schedule_later) {
            $campaign->start_date = $request->start_date ? date('Y-m-d', strtotime($request->start_date)) : date('Y-m-d');
        } else {
            $campaign->start_date = null;
        }
        $campaign->status = '0'; // Active by default
        $campaign->created_by = Auth::id();
        $campaign->save();
        return redirect()->back()->with('success', 'Campaign saved successfully');
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
}
