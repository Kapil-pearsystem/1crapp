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
use App\Models\Payment;
use App\Models\LeadMagnetModel;
use App\Models\CdbMailTemp;
use App\Models\CdbPopupForm;
use Illuminate\Support\Facades\Log;

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

    public function letsconnect($page_url){
        // $res = $this->testLetsConnectMail();
        // dd($res);
        $page = LeadMagnetModel::where(['page_url' => $page_url, 'is_public' => '1'])
        ->select('tbl_lead_magnet.*', 'lead_magenet1.company_name', 'lead_magenet1.company_email', 'lead_magenet1.company_email_type', 'lead_magenet1.company_phone', 'lead_magenet1.company_phone_type', 'lead_magenet1.company_address', 'lead_magenet1.company_website', 'lead_magenet1.company_logo', 'lead_magenet1.header_footer_bg_color', 'lead_magenet1.button_bg_color', 'lead_magenet1.header_footer_text_color', 'lead_magenet1.button_text_color')
        ->leftjoin('lead_magenet1', 'lead_magenet1.lead_magnet_id', 'tbl_lead_magnet.id')
        ->first();
        if(!$page){
            abort(404);
        }
        if($page->public_type == 'post-login' && !auth()->check()){
            return redirect()->route('login')->with('error', 'Please login to access this page.');
        }
        $formdata = CdbPopupForm::where('user_id', auth()->id())->first();
        // dd($formdata);
        return view('front.lets-connect', compact('page', 'formdata'));
    }
    public function lead_magnet(){
        $page = LeadMagnetModel::where(['user_id' => auth()->id()])
        ->select('tbl_lead_magnet.*', 'lead_magenet1.company_name', 'lead_magenet1.company_email', 'lead_magenet1.company_email_type', 'lead_magenet1.company_phone', 'lead_magenet1.company_phone_type', 'lead_magenet1.company_address', 'lead_magenet1.company_website', 'lead_magenet1.company_logo', 'lead_magenet1.header_footer_bg_color', 'lead_magenet1.button_bg_color', 'lead_magenet1.header_footer_text_color', 'lead_magenet1.button_text_color')
        ->leftjoin('lead_magenet1', 'lead_magenet1.lead_magnet_id', 'tbl_lead_magnet.id')
        ->first();
        $formdata = CdbPopupForm::where('user_id', auth()->id())->first();
        if(!$page){
            return redirect()->route('lead-magnet-form')->with('error', 'Please create a lead magnet page first.');
        }
        return view('dashboard.lead-magnet-view', compact('page', 'formdata'));
    }
    public function lead_magnet_form(){
        $details = LeadMagnetModel::where('user_id', auth()->id())
        ->select('tbl_lead_magnet.*', 'lead_magenet1.company_name', 'lead_magenet1.company_email', 'lead_magenet1.company_email_type', 'lead_magenet1.company_phone', 'lead_magenet1.company_phone_type', 'lead_magenet1.company_address', 'lead_magenet1.company_website', 'lead_magenet1.company_logo', 'lead_magenet1.header_footer_bg_color', 'lead_magenet1.button_bg_color', 'lead_magenet1.header_footer_text_color', 'lead_magenet1.button_text_color')
        ->leftjoin('lead_magenet1', 'lead_magenet1.lead_magnet_id', 'tbl_lead_magnet.id')
        ->first();
        // dd($details);
        
        $custom_form = CdbPopupForm::where('user_id', auth()->id())->first();
        return view('dashboard.lead-magnet-form', compact('details', 'custom_form'));
    }
    public function popup_form(){
        $details = CdbPopupForm::where('user_id', auth()->id())->first();
        $mailtemp = CdbMailTemp::where('user_id', auth()->id())->first();
        return view('dashboard.popup-form', compact('details', 'mailtemp'));
    }
    public function save_lets_connect(Request $request)
    {
        // dd($request->all());
        try {
            $request->validate([
                'form_id' => 'required',
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'phone' => 'nullable|string|max:20',
                'message' => 'nullable|string',
            ]);

            DB::table('cdb_lets_connect')->insert([
                'form_id' => base64_decode($request->form_id),
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'message' => $request->message,
                'ip_address' => $request->ip(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
            $form_details = CdbPopupForm::where('id', base64_decode($request->form_id))->first();
            $mail_data = CdbMailTemp::where('id', $form_details->mail_temp_id)->first();
            if ($mail_data && $mail_data->status == 1) {

                $data = [
                    'title' => $mail_data->title,
                    'celebration_text' => $mail_data->celebration_text,
                    'content' => $mail_data->content, // template content
                    'logo' => $mail_data->logo,

                    // ✅ dynamic enquiry data
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'user_message' => $request->message,
                ];
                // dd($data);
                // return view('front.Mail.cdb-letsconnect-mail', $data);
                $cc_email = $mail_data->cc_mailid;
                $attachment = $mail_data->attachment;

                Mail::send('front.Mail.cdb-letsconnect-mail', $data, function ($message) use ($request, $mail_data, $cc_email, $attachment) {

                    $message->to($request->email)
                            ->subject($mail_data->subject);

                    // ✅ CC Email
                    if (!empty($cc_email)) {
                        // multiple emails support (comma separated)
                        $message->cc(explode(',', $cc_email));
                    }

                    // ✅ Attachment
                    if (!empty($attachment)) {
                        $message->attach($attachment); 
                        // OR if full URL:
                        // $message->attach($attachment);
                    }
                });
            }

            return redirect()->back()
                ->with('success', $form_details->thankyou_message ?? 'Thank you for connecting with us! We will get back to you soon.')
                ->with('open_modal', true);

        } catch (\Illuminate\Validation\ValidationException $e) {

            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput()
                ->with('open_modal', true);

        } catch (\Exception $e) {

            Log::error($e);

            return redirect()->back()
                ->with('error', 'Something went wrong. Please try again!')
                ->with('open_modal', true);
        }
    }
    public function resend_mail(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:cdb_lets_connect,id',
        ]);
        try {
            $lead = DB::table('cdb_lets_connect')->where('id', $request->id)->first();
            if (!$lead) {
                return back()->with('error', 'Lead not found');
            }
            $form_details = CdbPopupForm::where('id', $lead->form_id)->first();
            $mail_data = CdbMailTemp::where('id', $form_details->mail_temp_id ?? null)->first();
            if (!$mail_data || $mail_data->status != 1) {
                return back()->with('error', 'Mail template inactive or not found');
            }
            // ✅ Prepare data
            $data = [
                'title' => $mail_data->title,
                'celebration_text' => $mail_data->celebration_text,
                'content' => $mail_data->content,
                'logo' => $mail_data->logo,
                'name' => $lead->name,
                'email' => $lead->email,
                'phone' => $lead->phone,
                'user_message' => $lead->message,
            ];
            $cc_email = $mail_data->cc_mailid;
            $attachment = $mail_data->attachment;
            // ✅ Send Mail
            Mail::send('front.Mail.cdb-letsconnect-mail', $data, function ($message) use ($lead, $mail_data, $cc_email, $attachment) {
                $message->to($lead->email) // ❗ FIXED (was request email)
                        ->subject($mail_data->subject);
                // ✅ CC
                if (!empty($cc_email)) {
                    $message->cc(array_map('trim', explode(',', $cc_email)));
                }
                // ✅ Attachment
                if (!empty($attachment)) {
                    // if stored in public folder
                    if (file_exists(public_path($attachment))) {
                        $message->attach(public_path($attachment));
                    } else {
                        // fallback (if URL)
                        $message->attach($attachment);
                    }
                }
            });
            return redirect()->back()->with('success', 'Mail resent successfully!');

        } catch (\Exception $e) {
            \Log::error('Resend Mail Error', [
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
            ]);
            return redirect()->back()->with('error', 'Failed to resend mail. Please try again.');
        }
    }
    public function mail_preview(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:cdb_lets_connect,id',
        ]);
        try {
            $lead = DB::table('cdb_lets_connect')->where('id', $request->id)->first();
            if (!$lead) {
                return response()->json(['error' => 'Lead not found'], 404);
            }
            $form_details = CdbPopupForm::where('id', $lead->form_id)->first();
            $mail_data = CdbMailTemp::where('id', $form_details->mail_temp_id ?? null)->first();
            if (!$mail_data || $mail_data->status != 1) {
                return response()->json(['error' => 'Mail template inactive or not found'], 404);
            }
            // Prepare data
            $data = [
                'title' => $mail_data->title,
                'celebration_text' => $mail_data->celebration_text,
                'content' => $mail_data->content,
                'logo' => $mail_data->logo,
                'name' => $lead->name,
                'email' => $lead->email,
                'phone' => $lead->phone,
                'user_message' => $lead->message,
            ];
            // Render mail preview HTML
            $html = view('front.Mail.cdb-letsconnect-mail', $data)->render();
            return response()->json(['status' => 'success', 'data' => $html], 200);

        } catch (\Exception $e) {
            \Log::error('Mail Preview Error', [
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
            ]);
            return response()->json(['status' => 'error', 'message' => 'Failed to load mail preview. Please try again.'], 500);
        }

    }
    public function get_whatsapp_link(Request $request)
    {
        $link = $request->link;
        $lead = DB::table('cdb_lets_connect')->where('id', $request->id)->first();
        if (!$lead) {
            return response()->json(['status' => false, 'msg' => 'Lead not found!'], 404);
        }
        $whatsAppNumber = $lead->phone;
        $message = urlencode($request->message);
        $whatsAppLink = "https://wa.me/{$whatsAppNumber}?text={$message}";
        $html = '
            <div class="text-center text-primary border border-secondary bg-light p-3 rounded" style="max-width: 600px; margin: auto;">
                <p class="mb-3" style="font-size: 14px; font-weight: bold;">Scan to Share:</p>
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=' . urlencode($whatsAppLink) . '" alt="QR Code" />
                <p class="mt-3 mb-3" style="font-size: 16px; font-weight: bold;">Your Link:</p>
                <div class="bg-white p-2 border rounded text-info" style="word-wrap: break-word;">
                    ' . $link . '
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="' . $whatsAppLink . '" target="_blank" class="btn btn-success d-flex align-items-center justify-content-center" style="font-size: 14px; padding: 10px 20px; border-radius: 5px;">
                    <i class="fa fa-whatsapp" style="margin-right: 8px;"></i> Send Link via WhatsApp
                </a>
            </div>';



        return response()->json(['status' => true, 'msg' => 'WhatsApp link generated successfully!', 'data' => $html], 200);
    }
    public function lead_magnet_list(){
        $lists = DB::table('cdb_lets_connect')->select('cdb_lets_connect.*','cdb_popup_form.title as form_name','tbl_lead_magnet.page_url as page_name')
        ->join('cdb_popup_form', 'cdb_popup_form.id', 'cdb_lets_connect.form_id')
        ->leftjoin('tbl_lead_magnet', 'tbl_lead_magnet.custom_form_id', 'cdb_popup_form.id')
        ->where('cdb_popup_form.user_id', auth()->id())->orderBy('id', 'desc')->paginate(10);
        // dd($lists);
        return view('dashboard.lead-magnet-enquiry-list', compact('lists'));
    }
    public function testLetsConnectMail()
    {
        try {

            $mail_data = CdbMailTemp::first();

            if (!$mail_data || $mail_data->status != 1) {
                return "Mail template not active!";
            }

            // ✅ Dummy/Test Data
            $data = [
                'title' => $mail_data->title,
                'celebration_text' => $mail_data->celebration_text,
                'content' => $mail_data->content,
                'logo' => $mail_data->logo,

                'name' => 'Test User',
                'email' => 'test@example.com',
                'phone' => '9999999999',
                'user_message' => 'This is a test enquiry message.',
            ];

            // Optional: preview before sending
            // return view('emails.cdb-letsconnect-mail', $data);

            Mail::send('front.Mail.cdb-letsconnect-mail', $data, function ($message) use ($mail_data) {
                $message->to('test10012@yopmail.com') // 👈 change to your email
                        ->subject('[TEST] ' . $mail_data->subject);
            });

            return "Test mail sent successfully!";

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function popup_form_store(Request $request){
        // dd($request->all());
        $request->validate([
            'title' => 'required|string|max:255',
            'mail_temp_id' => 'required|integer|exists:cdb_mail_temp,id',
            'form_source' => 'required|string|max:255',
            'content' => 'nullable|string',
            'cta_btn_text' => 'nullable|string',
            'thankyou_message' => 'nullable|string',
        ]);
        $logoPath = null;
        if ($request->hasFile('file_path')) {
            if ($request->id) {
                $form_details = CdbPopupForm::where('user_id', auth()->id())->first();
                if ($form_details && $form_details->file_path && file_exists(public_path($form_details->file_path))) {
                    unlink(public_path($form_details->file_path)); // 🔥 delete old file
                }
            }
            // Make sure the uploads/company_logo folder exists
            $uploadPath = public_path('uploads/lead_magnets');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true); // recursive create
            }
     
            $file = $request->file('file_path');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move($uploadPath, $filename);
     
            $logoPath = 'uploads/lead_magnets/' . $filename; // store relative path in DB
        }else{
            $form_details = CdbPopupForm::where('user_id', auth()->id())->first();
            $logoPath = $form_details->file_path ?? null;
        }
        $formdata = CdbPopupForm::updateOrCreate(
            ['user_id' => auth()->id()],
            [
                'title' => $request->title,
                'mail_temp_id' => $request->mail_temp_id,
                'form_source' => $request->form_source,
                'contact_field' => $request->contact_field??0,
                'msg_field' => $request->msg_field??0,
                'content' => $request->content,
                'cta_btn_text' => $request->cta_btn_text,
                'thankyou_message' => $request->thankyou_message,
                'image_visible' => $request->image_visible??0,
                'thankyou_cta_link' => $request->thankyou_cta_link,
                'thankyou_cta_text' => $request->thankyou_cta_text,
                'file_path' => $logoPath,
            ]
        );

        if ($formdata) {
            return redirect()->back()->with('success', 'Popup Form saved successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to save Popup Form. Please try again.');
        }
    }
    public function mail_template_form(){
        $details = CdbMailTemp::where('user_id', auth()->id())->first();
        return view('dashboard.mail-template-form', compact('details'));
    }
    public function mail_template_store(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'celebration_text' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'content' => 'nullable|string',
            'status' => 'required|in:0,1',
        ]);
        $logoPath = null;
        if ($request->hasFile('logo')) {
            if ($request->id) {
                $mail_details = CdbMailTemp::where('user_id', auth()->id())->first();
                if ($mail_details && $mail_details->logo && file_exists(public_path($mail_details->logo))) {
                    unlink(public_path($mail_details->logo)); // 🔥 delete old file
                }
            }
            // Make sure the uploads/company_logo folder exists
            $uploadPath = public_path('uploads/lead_magnets');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true); // recursive create
            }
     
            $file = $request->file('logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move($uploadPath, $filename);
     
            $logoPath = 'uploads/lead_magnets/' . $filename; // store relative path in DB
        }else{
            $mail_details = CdbMailTemp::where('user_id', auth()->id())->first();
            $logoPath = $mail_details->logo ?? null;
        }
        $mailTemp = CdbMailTemp::updateOrCreate(
            ['user_id' => auth()->id()],
            [
                'title' => $request->title,
                'celebration_text' => $request->celebration_text,
                'subject' => $request->subject,
                'content' => $request->content,
                'status' => $request->status,
                'logo' => $logoPath,
                'attachment' => $request->attachment,
                'cc_mailid' => $request->cc_mailid,
            ]
        );

        if ($mailTemp) {
            return redirect()->back()->with('success', 'Mail Template saved successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to save Mail Template. Please try again.');
        }
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
    // ... other methods ...
    public function update_lead(Request $request){
        $request->validate([
            'id' => 'required|integer|exists:cdb_lets_connect,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'message' => 'nullable|string',
        ]);
        DB::table('cdb_lets_connect')->where('id', $request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
            'updated_at' => Carbon::now()
        ]);
        return redirect()->back()->with('success', 'Lead updated successfully.');
    }
    public function update_status(Request $request){
        $request->validate([
            'id' => 'required|integer|exists:cdb_lets_connect,id',
            'status' => 'required|in:0,1,2,3,4,5',
        ]);
        DB::table('cdb_lets_connect')->where('id', $request->id)->update([
            'status' => $request->status,
            'updated_at' => Carbon::now()
        ]);
        return response()->json(['success' => true, 'message' => 'Status updated successfully']);
    }
    public function delete_lead($id){
        DB::table('cdb_lets_connect')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Lead deleted successfully.');
    }
    
    public function export_leads()
    {
        $status = [
            0 => 'Rejected',
            1 => 'Pending',
            2 => 'In Progress',
            3 => 'Closed',
            4 => 'Not Related',
            5 => 'Accelerated'
        ];

        $fileName = 'cdb_lets_connect_' . date('Y-m-d_H-i-s') . '.csv';

        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate",
            "Expires"             => "0"
        ];

        $columns = [
            'Name',
            'Email',
            'Phone',
            'Message',
            'Date',
            'Status'
        ];

        // ✅ PASS $status here
        $callback = function () use ($columns, $status) {

            $file = fopen('php://output', 'w');

            // Header
            fputcsv($file, $columns);

            DB::table('cdb_lets_connect')
                ->orderBy('id', 'desc')
                ->chunk(500, function ($rows) use ($file, $status) {

                    foreach ($rows as $row) {
                        fputcsv($file, [
                            $row->name,
                            $row->email,
                            $row->phone,
                            strip_tags($row->message), // optional clean
                            $row->created_at,
                            $status[$row->status] ?? 'Unknown',
                        ]);
                    }

                });

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}