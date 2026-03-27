<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\EnquiryModel;
use App\Models\Notification;
use App\Models\UserWallet;
use App\Models\ViewedNotificationsModel;
use App\Models\ProductServiceCategory;
use App\Models\ProductService;
use App\Models\ProductInspection;
use App\Models\CDOModel;
use App\Models\ProductEnquiry;
use App\Models\CdbTransactionModel;
use App\Models\CdbPlanFeature;;
use App\Models\Payment;;

class HomeController extends Controller
{
    public function save_enquiry(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:tbl_enquiry,email',
            'phone' => 'required|min:6|max:12',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $enquiry = new EnquiryModel();
        $enquiry->name = $request->name;
        $enquiry->email = $request->email;
        $enquiry->phone = $request->phone;
        $enquiry->message = $request->message;
        $enquiry->created_at = Carbon::now();
        $enquiry->updated_at = Carbon::now();
        if($enquiry->save()){
            return redirect()->back()->with('success', 'Your Enquiry Submitted Successfully. We will contact you soon.');
        }else{
            return redirect()->back()->with('error', 'Your Enquiry Submitting Error. Please Try Again.');
        }
    }
    public function notifications(){
        $viewed = ViewedNotificationsModel::where(['user_id' => Auth::id(), 'type' => 1])->distinct()->pluck('notification_id')->toArray();
        // dd($viewed);
        $notifications = Notification::select('notifications.*','notifications_category.name as category','notifications_category.icon as icon')
        ->join('notifications_category','notifications_category.id','notifications.type')
        ->join('agents','agents.id','notifications.created_by')
        ->where('agents.role_id',2)
        ->whereNotIn('notifications.id',$viewed)
        ->where('notifications.created_by', app('currentAgent')->id)
        ->orderBy('notifications.id','DESC')->get();
        // dd($notifications);
        return view('dashboard.notifications',compact('notifications'));

    }
    public function read_notification(Request $request)
    {
        $request->validate([
            'notification_id' => 'required|integer',
        ]);
        DB::beginTransaction();
        try {
            $viewedNotification = new ViewedNotificationsModel();
            $viewedNotification->type = 1;
            $viewedNotification->user_id = Auth::id();
            $viewedNotification->notification_id = $request->notification_id;
            $viewedNotification->created_by = Auth::id();
            $viewedNotification->created_at = now();
            $viewedNotification->updated_at = now();
            $viewedNotification->save();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Notification marked as read successfully.',
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'Failed to mark the notification as read.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    public function billing(){
        $active_features = CdbPlanFeature::where('agent_id', app('currentAgent')->id)->get();
        // dd($active_features);
        $transacrions = CdbTransactionModel::select('cdb_transactions.*', 'cdb_plans.title as plan_name','plan_type.title as plan_type_title')
        ->join('plan_type', 'plan_type.id','=','cdb_transactions.plan_type')
        ->join('cdb_plans', 'cdb_plans.id','=','cdb_transactions.plan_id')->where('cdb_transactions.user_id', Auth::user()->id)->paginate(10);
        $adb_transacrions = Payment::select('payments.*', 'subscription_plans.title as plan_name','plan_type.title as plan_type_title')
        ->join('plan_type', 'plan_type.id','=','payments.plan_type')
        ->join('subscription_plans', 'subscription_plans.id','=','payments.plan_id')
        ->where('payments.user_email', Auth::user()->email)->paginate(10);
        // dd($transacrions);
        $agent_details = DB::table('agents')->where('email', Auth::user()->email)->first();
        // dd($agent_details);
        return view('dashboard.billing', compact('transacrions','active_features', 'adb_transacrions', 'agent_details'));
    }
    
    public function earn_with_us(){

        return view('dashboard.earn-with-us');
    }
   public function wallet(Request $request)
    {
        $user_data = Auth::user();
        $activeTab = $request->get('tab', 'welcome'); // get tab query
    
        $welcome_bonus = UserWallet::where('ownerAccount', $user_data->id)
            ->where('txn_type', 1)
            ->orderBy('id', 'DESC')
            ->paginate(10, ['*'], 'welcome_page');
    
        $affiliate_bonus = UserWallet::where('ownerAccount', $user_data->id)
            ->where('txn_type', 2)
            ->orderBy('id', 'DESC')
            ->paginate(10, ['*'], 'affiliate_page');
    
        $commission_bonus = UserWallet::where('ownerAccount', $user_data->id)
            ->where('txn_type', 3)
            ->orderBy('id', 'DESC')
            ->paginate(10, ['*'], 'commission_page');
            $sum_data = array();
        $totals = UserWallet::where('ownerAccount', $user_data->id)
        ->whereIn('txn_type', [1, 2, 3]) // Filter for all 3 types
        ->selectRaw('
            SUM(CASE WHEN txn_type = 1 THEN amount ELSE 0 END) AS welcome_total,
            SUM(CASE WHEN txn_type = 2 THEN amount ELSE 0 END) AS affiliate_total,
            SUM(CASE WHEN txn_type = 3 THEN amount ELSE 0 END) AS commission_total
        ')
        ->first(); // Get the first row since it's just one result
    
        $sum_data['welcome_total'] = $totals->welcome_total ?? 0;
        $sum_data['affiliate_total'] = $totals->affiliate_total ?? 0;
        $sum_data['commission_total'] = $totals->commission_total ?? 0;
    
        return view('dashboard.wallet', compact(
            'user_data',
            'welcome_bonus',
            'affiliate_bonus',
            'commission_bonus',
            'sum_data',
            'activeTab'
        ));
    }


    public function lead_magnet(){
        return view('front.lead-magnet');
    }
    public function lead_magnet_form(){
        return view('dashboard.lead-magnet-form');
    }
    public function services_for_you(){
        $categories = ProductServiceCategory::where('status', 1)->get();
        $cdos = CDOModel::where('status', 1)->get(); // Only active companies
        return view('front.services-for-you', compact('categories', 'cdos'));
    }
   public function fetchProducts(Request $request)
    {
        $query = ProductService::with('category'); // eager load category
        // Filter by category if selected
        if ($request->filled('category_id')) {
            $query->where('prod_category', $request->category_id);
        }
     
        // Filter by discount range if selected
        if ($request->filled('discount_range')) {
            [$min, $max] = explode('-', $request->discount_range);
            $query->whereBetween('discount_percent', [(int)$min, (int)$max]);
        }
     
        $products = $query->where(['agent_id'=>app('currentAgent')->id])->get();
     
        return response()->json($products);
    }
    // AJAX to fetch inspection for a product
    public function fetch_inspection(Request $request){
        $inspection = ProductInspection::where('product_id', $request->product_id)
                    ->where(['status'=> 1, 'created_by'=>app('currentAgent')->id])
                    ->orderBy('id', 'desc')
                    ->first();
     
        return response()->json($inspection);
    }
    public function submitEnquiry(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:product_services,id',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'cdo_id' => 'required|exists:tbl_cdo,id',
        ]);
     
        $enquiry = new ProductEnquiry();
        $enquiry->product_id = $request->product_id;
        $enquiry->product_inspection_id = $request->product_inspection_id;
        $enquiry->first_name = $request->first_name;
        $enquiry->last_name = $request->last_name;
        $enquiry->email = $request->email;
        $enquiry->phone = $request->phone;
        $enquiry->cdo_id = $request->cdo_id;
        $enquiry->brief_requirement = $request->brief_requirement;
        $enquiry->message = $request->message;
        $enquiry->save();
     
        return response()->json(['success' => true, 'message' => 'Enquiry submitted successfully']);
    }
}