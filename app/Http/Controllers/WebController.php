<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Auth;
use App\Models\BannerModel;
use App\Models\EasytoShareModel;
use App\Models\EasytoUseModel;
use App\Models\FaqCategoryModel;
use App\Models\FaqModel;
use App\Models\FeatureModel;
use App\Models\ServiceCategoryModel;
use App\Models\ServiceModel;
use App\Models\TestimonialsModel;
use App\Models\OurClientsModel;
use App\Models\QuicklyAnalyzeModel;
use App\Models\SubscribeModel;
use App\Models\Cms;
use App\Models\WorkMatrixModel;
use App\Models\NeedHelpModel;
use App\Models\HowItWorkModel;
use App\Models\AboutUsModel;
use App\Models\MeetTeamModel;
use App\Models\TeamDetailModel;
use App\Models\MeetCategoryModel;
use App\Models\AffiliateEnquiryModel;
use App\Models\SubscriptionPlan;
use App\Models\PlanFeature;
use App\Models\Payment;
use App\Models\Subscription;
use App\Models\UserWallet;

use App\Models\PlanTypeModel;
use App\Models\CdbFeature;
use App\Models\CdbPlanModel;
use App\Models\CdbPlanFeature;
use App\Models\CdbTransactionModel;

use App\Mail\BecomeAgent;
use App\Models\LeadMagnetModel;
use App\Models\LeadMagenetModel1;

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;


class WebController extends Controller
{
     public function index()
     {
      // dd(app('currentAgent')->id);
      $quickly_analyze = QuicklyAnalyzeModel::where('status', 1)->limit(6)->orderBy('id', 'DESC')->get();
      $banners = BannerModel::where(['status'=> 1, 'created_by'=>app('currentAgent')->id])->orderBy('id', 'DESC')->get();
      $clients = OurClientsModel::where(['status'=> 1, 'created_by'=>app('currentAgent')->id])->orderBy('id', 'DESC')->limit(12)->get();
      $services = ServiceModel::select('ws_services.*','ws_servicecategory.title as category_name','ws_servicecategory.slug as category_slug')->join('ws_servicecategory','ws_servicecategory.id','=','ws_services.category_id')->where(['ws_services.status'=> 1, 'ws_services.created_by'=>app('currentAgent')->id])->orderBy('ws_services.id','ASC')->get();
      $easytoshare = EasytoShareModel::where(['status'=> 1, 'created_by'=>app('currentAgent')->id])->orderBy('id', 'DESC')->get();
      $easytouse = EasytoUseModel::where(['status'=> 1, 'created_by'=>app('currentAgent')->id])->limit(6)->orderBy('id', 'DESC')->get();
      
        $workmatrix = WorkMatrixModel::where(['status'=> 1, 'created_by'=>app('currentAgent')->id])->orderBy('priority', 'DESC')->get();
        $needhelp = NeedHelpModel::where(['status'=> 1, 'created_by'=>app('currentAgent')->id])->orderBy('priority', 'ASC')->get();
        $how_it_works = HowItWorkModel::where(['status'=> 1, 'created_by'=>app('currentAgent')->id,'category'=>1])->orderBy('step', 'ASC')->get();

      $testimonials = OurClientsModel::where(['status'=> 1, 'created_by'=>app('currentAgent')->id])->orderBy('id', 'DESC')->limit(3)->get();
 
      return view('web.pages.index', compact('banners', 'services', 'testimonials', 'clients', 'quickly_analyze', 'easytoshare', 'easytouse', 'needhelp', 'workmatrix', 'how_it_works'));
    }
    public function how_it_works(){
        $easytoshare = EasytoShareModel::where(['status'=> 1, 'created_by'=>app('currentAgent')->id])->orderBy('id', 'DESC')->get();
        $easytouse = EasytoUseModel::where(['status'=> 1, 'created_by'=>app('currentAgent')->id])->limit(6)->orderBy('id', 'DESC')->get();
        return view('web.pages.how-it-works', compact('easytoshare','easytouse'));
    }
    public function features(){
      $features = FeatureModel::where(['status'=> 1, 'created_by'=>app('currentAgent')->id])->orderBy('id', 'DESC')->get();
       return view('web.pages.features',compact('features'));
    }
    public function about_us()
    {
        // Fetch the latest active About Us record
        $about = AboutUsModel::where(['status'=> 1, 'created_by'=>app('currentAgent')->id])->latest()->first();
        // dd($about);
 
        // Pass it to the view
        return view('web.pages.about-us', compact('about'));
    }
    public function faq()
    {
        // dd(app('currentAgent')->id);
      $categories = FaqCategoryModel::where(['status'=> 1, 'created_by'=>app('currentAgent')->id])->orderBy('priority', 'DESC')->get();
    
      $faqData = [];
    
      foreach ($categories as $category) {
         $faqs = FaqModel::where(['category'=> $category->id, 'created_by'=>app('currentAgent')->id])
            ->get(['id', 'title', 'description', 'status', 'created_by', 'created_at', 'updated_at']);
    
         $faqData[] = [
            'category' => $category,
            'faqs' => $faqs,
         ];
      }
    // dd($faqData);
      return view('web.pages.faq', compact('faqData', 'categories'));
    }
    
    public function price(){
        $user = Auth()->user();
        $plan_type = PlanTypeModel::where('status', 1)->orderBy('total_days', 'ASC')->get();
        $cdb_plans = CdbPlanModel::where(['status' => 1, 'agent_id'=>app('currentAgent')->id])->orderBy('id', 'ASC')->get();
        $c_feature = CdbFeature::all();
        $have_cdb_plan = 0;
        $active_user_plan = null;
        if(!is_null($user->package_id)){
            $active_user_plan = CdbPlanModel::select('id', 'monthly_price')->where(['id'=>$user->package_id, 'status' => 1, 'agent_id'=>app('currentAgent')->id])->first();
            $have_cdb_plan = 1;
        }
        // dd($user);
        $plans = SubscriptionPlan::where(['status' => 1])->orderBy('priority', 'ASC')->get();
        $features = PlanFeature::all();
        $have_any_plan=1; 
        $is_active_plan=1;
        $active_agent_plan = null;
        $agent = DB::table('agents')->where('email', $user->email)->first();
        if ($agent) {
           $have_any_plan=2; 
           if (empty($agent->valid_upto) || Carbon::parse($agent->valid_upto)->isPast()) {
                
            }else{
                $active_agent_plan = SubscriptionPlan::select('id', 'monthly_price')->where(['id'=>$agent->package_id, 'status' => 1])->first();
                $is_active_plan=2;
            }
        }
        // dd($active_agent_plan);
        return view('web.pages.price', compact('plans','features','have_any_plan', 'is_active_plan', 'active_agent_plan', 'agent', 'cdb_plans','c_feature','have_cdb_plan','plan_type','active_user_plan','user'));
    }
    public function create_order(Request $request)
    {
        $api = new Api(config('razorpay.key'), config('razorpay.secret'));
    
        $amount = $request->amount; // paise
    
        $order = $api->order->create([
            'receipt' => uniqid(),
            'amount' => $amount,
            'currency' => 'INR'
        ]);
    
        return response()->json([
            'order_id' => $order->id,
            'amount' => $amount
        ]);
    }
    public function upgrade_plan(Request $request)
    {
    
        $user = Auth()->user();
        $api = new Api(config('razorpay.key'), config('razorpay.secret'));
        DB::beginTransaction();
        // try {
            // 🔹 Verify signature
            $attributes = [
                'razorpay_order_id' => $request->razorpay_order_id,
                'razorpay_payment_id' => $request->razorpay_payment_id,
                'razorpay_signature' => $request->razorpay_signature
            ];
    
            $api->utility->verifyPaymentSignature($attributes);
    
            // 🔹 Fetch payment
            $payment = $api->payment->fetch($request->razorpay_payment_id);
            // dd($payment);
            if($payment->status != 'captured'){
                $payment = $payment->capture(['amount' => $payment->amount]);
            }
            $amount = $payment->amount / 100;
            $plan_id = $request->plan_id;
            $plan_type_id = $request->plan_type;
            $plan = SubscriptionPlan::find($plan_id);
            $planType = PlanTypeModel::find($plan_type_id);
            if(!$plan || !$planType){
                throw new \Exception("Invalid Plan");
            }
            $agent = DB::table('agents')->where('email',$user->email)->first();
    
            // calculate validity
            // $validUpto = Carbon::now();
            // $remainingDays = 0;
            // if($agent && $agent->valid_upto && Carbon::parse($agent->valid_upto)->isFuture()){
            //     $validUpto = Carbon::parse($agent->valid_upto);
            //     $remainingDays = Carbon::now()->diffInDays($validUpto);
            // }
            
            // $currentPlanType = PlanTypeModel::find($agent->package_type_id);
            // $current_plan = SubscriptionPlan::find($agent->package_id);
            // $currentPlanPerDayPrice = $current_plan->amount/$current_plan->total_days;
            // if($current_plan->amount < $plan->amount){
            //     if($remainingDays > 0){
                    
            //     }
            // }
    
            // $validUpto->addDays($planType->total_days);
            $validUpto = Carbon::now();
            $remainingDays = 0;
            $totalDays = 0;
            if ($agent && $agent->valid_upto && Carbon::parse($agent->valid_upto)->isFuture()) {
                $validUpto = Carbon::parse($agent->valid_upto);
                $remainingDays = Carbon::now()->diffInDays($validUpto);
                $current_plan = SubscriptionPlan::find($agent->package_id);
                // dd('Current:'.$current_plan->monthly_price, 'Upgrade:'.$plan->monthly_price);
                if (!is_null($current_plan) && $current_plan->monthly_price <= $plan->monthly_price) {
                    $currentPlanPerDayPrice = $current_plan->monthly_price / 30;
                    if ($remainingDays > 0) {
                        // remaining value of old plan
                        $remainingAmount = $remainingDays * $currentPlanPerDayPrice;
                        // per day price of new plan
                        $newPlanPerDay = $plan->monthly_price / 30;
                        // extra days from remaining value
                        $extraDays = floor($remainingAmount / $newPlanPerDay);
                        // total validity
                        $totalDays = $planType->total_days + $extraDays;
                        $validUpto = Carbon::now()->addDays($totalDays);
                        // dd('Total Days: '.$totalDays, 'Valid Upto:'.$validUpto, 'Remaining Amount'.$remainingAmount);
                    } else {
                        $validUpto = Carbon::now()->addDays($planType->total_days);
                    }
                } else {
                    $validUpto = Carbon::now()->addDays($planType->total_days);
                }
            }else{
                $validUpto = Carbon::now()->addDays($planType->total_days);
            }
            
            //  dd($remainingDays,$currentPlanPerDayPrice,  $validUpto, $totalDays);
            // 🔹 create agent if not exist
            if(!$agent){
    
                $agentId = DB::table('agents')->insertGetId([
                    'subdomain'=>Str::slug($user->name),
                    'first_name'=>$user->name,
                    'email'=>$user->email,
                    'mobile_number'=>$user->mobile,
                    'role_id'=>2,
                    'status'=>1,
                    'password'=>$user->password,
                    'package_id'=>$plan_id,
                    'package_type_id'=>$plan_type_id,
                    'valid_upto'=>$validUpto,
                    'created_at'=>now()
                ]);
    
            }else{
    
                $agentId = $agent->id;
    
                DB::table('agents')
                ->where('id',$agentId)
                ->update([
                    'package_id'=>$plan_id,
                    'package_type_id'=>$plan_type_id,
                    'valid_upto'=>$validUpto,
                    'updated_at'=>now()
                ]);
            }
    
            // 🔹 save payment
            Payment::create([
                'user_id'=>$agentId,
                'plan_id'=>$plan_id,
                'plan_type'=>$plan_type_id,
                'r_payment_id'=>$payment->id,
                'method'=>$payment->method,
                'currency'=>$payment->currency,
                'user_email'=>$payment->email,
                'amount'=>$amount,
                'json_response'=>json_encode($payment),
                'created_at'=>now()
            ]);
    
            // 🔹 save subscription
            Subscription::create([
                'user_id'=>$agentId,
                'plan_type'=>$plan_type_id,
                'plan'=>$plan_id,
                'product'=>$plan->title,
                'amount'=>$amount,
                'reference_no'=>$payment->id,
                'payment_mode'=>$payment->method,
                'created_at'=>now()
            ]);
    
            DB::commit();
    
            return redirect()->back()->with('success','Plan Upgraded successfully');
    
        // }catch(SignatureVerificationError $e){
    
        //     DB::rollBack();
        //     return back()->with('error','Payment verification failed');
    
        // }
        // catch(\Throwable $e){
    
        //     DB::rollBack();
        //     return back()->with('error',$e->getMessage());
        // }
    }
    
    // Upgrade CDB Plans
    public function upgrade_cdb_plan(Request $request)
    {
        $user = Auth()->user();
    
        $api = new Api(config('razorpay.key'), config('razorpay.secret'));
    
        if (!empty($request->razorpay_payment_id)) {
    
            DB::beginTransaction();
    
            try {
                
                // 🔹 Verify Razorpay Signature
                $attributes = [
                    'razorpay_order_id'   => $request->razorpay_order_id,
                    'razorpay_payment_id' => $request->razorpay_payment_id,
                    'razorpay_signature'  => $request->razorpay_signature
                ];
    
                $api->utility->verifyPaymentSignature($attributes);
    
                // 🔹 Fetch Payment
                $payment = $api->payment->fetch($request->razorpay_payment_id);
    
                // 🔹 Capture Payment if not captured
                if ($payment->status != 'captured') {
                    $payment = $payment->capture(['amount' => $payment->amount]);
                }
    
                $description = explode('||', $payment['description']);
                $plan_name = $description[0];
                $plan_id = $request->plan_id;
                $plan_type_id = $request->plan_type;
                $amount = $payment['amount'] / 100;
                $planType = PlanTypeModel::find($plan_type_id);
                $subscription_plan = CdbPlanModel::find($plan_id);
                // 🔹 Get user again
                $userData = DB::table('users')->where('email', $user->email)->first();
    
                // $validUpto = Carbon::now();
                // if ($userData->valid_upto && Carbon::parse($userData->valid_upto)->isFuture()) {
                //     $validUpto = Carbon::parse($userData->valid_upto);
                // }
                // $validUpto->addDays($planType->total_days);
                // ----------------------------upgrade plan functionality-------------------------------
                    $validUpto = Carbon::now();
                    $remainingDays = 0;
                    $totalDays = 0;
                     if ($userData->valid_upto && Carbon::parse($userData->valid_upto)->isFuture()) {
                        $validUpto = Carbon::parse($userData->valid_upto);
                        $remainingDays = Carbon::now()->diffInDays($validUpto);
                    }
                   
                    // $currentPlanType = PlanTypeModel::find($userData->package_type_id);
                    $current_plan = CdbPlanModel::find($userData->package_id);
                    if ($current_plan && $current_plan->monthly_price < $subscription_plan->monthly_price) {
                        $currentPlanPerDayPrice = $current_plan->monthly_price / 30;
                        if ($remainingDays > 0) {
                            // remaining value of old plan
                            $remainingAmount = $remainingDays * $currentPlanPerDayPrice;
                            // per day price of new plan
                            $newPlanPerDay = $subscription_plan->monthly_price / 30;
                            // extra days from remaining value
                            $extraDays = floor($remainingAmount / $newPlanPerDay);
                            // total validity
                            $totalDays = $planType->total_days + $extraDays;
                            $validUpto = Carbon::now()->addDays($totalDays);
                        } else {
                            $validUpto = Carbon::now()->addDays($planType->total_days);
                        }
                    } else {
                        $validUpto = Carbon::now()->addDays($planType->total_days);
                    }
                // ----------------------------upgrade plan functionality-------------------------------
                // 🔹 Update user plan
                DB::table('users')
                    ->where('id', $userData->id)
                    ->update([
                        'valid_upto' => $validUpto,
                        'package_id' => $plan_id,
                        'package_type_id' => $planType->id,
                        'updated_at' => now(),
                    ]);
    
                // 🔹 Save transaction
                CdbTransactionModel::create([
                    'user_id' => $userData->id,
                    'txn_id' => 'TXNCDB' . rand(11111111, 99999999),
                    'razorpay_id' => $payment['id'],
                    'razorpay_payment_id' => $request->razorpay_payment_id,
                    'plan_id' => $plan_id,
                    'plan_type' => $planType->id,
                    'plan_duration' => $validUpto,
                    'payment_mode' => $payment['method'],
                    'user_email' => $payment['email'],
                    'currency' => $payment['currency'],
                    'status' => 1,
                    'amount' => $amount,
                    'json_response' => json_encode((array)$payment),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
    
                DB::commit();
    
            }catch (SignatureVerificationError $e) {
    
                DB::rollBack();
                return redirect()->back()->with('error', 'Payment verification failed.');
    
            } 
            catch (\Throwable $e) {
    
                DB::rollBack();
                return redirect()->back()->with('error', $e->getMessage());
            }
        }
        return redirect()->back()->with('success', 'Subscription Plan upgraded successfully!');
    }
    public function getReferralCode(){
        $referral_code = '1CRAPP-AGT'.rand(100000, 999999);
        if(DB::table('agents')->where('referral_code', $referral_code)->exists()){
            $this->getReferralCode();
        }
        return $referral_code;
    }
    public function help(){
        $needhelp = NeedHelpModel::where(['status'=> 1, 'created_by'=>app('currentAgent')->id])->orderBy('priority', 'ASC')->get();
       return view('web.pages.help', compact('needhelp'));
    }
    public function resources_tools(){
       return view('web.pages.resources-tools');
    }
    public function meet_team()
    {
        // Get the main Meet Team page content (assumed only one active row)
        $meetTeam = MeetTeamModel::where(['status'=> 1, 'created_by'=>app('currentAgent')->id])->first();
     
        // Get all categories active
        $categories = MeetCategoryModel::where(['status'=> 1, 'created_by'=>app('currentAgent')->id])->get();
     
        // Get all team details grouped by category id for easy use in view
        $teamDetails = TeamDetailModel::where(['status'=> 1, 'created_by'=>app('currentAgent')->id])->get()->groupBy('category_id');
        $needhelp = NeedHelpModel::where(['status'=> 1, 'created_by'=>app('currentAgent')->id])->orderBy('priority', 'ASC')->get();
        return view('web.pages.meet-team', compact('meetTeam', 'categories', 'teamDetails', 'needhelp'));
    }
    public function Signup_subscribe(Request $request)
    {
      // dd(url()->previous());
        $request->validate([
            'email' => 'required|email',
        ]);

        $email = $request->email;
        $agentId = app('currentAgent')->id;
        $alreadySubscribed = SubscribeModel::where('email', $email)->exists();

        if ($alreadySubscribed) {
            return redirect()->to(url()->previous())->with('error', 'You have already subscribed with this email. Please try a different one.');
        }

        $subscription = SubscribeModel::create([
            'email' => $email,
            'agent_id' => $agentId,
        ]);

        if ($subscription) {
            return redirect()->to(url()->previous())->with('success', 'Thank you for subscribing!');
        }

        return redirect()->to(url()->previous())->with('error', 'Subscription failed!');
    }
    
    
    public function privacy_policy(){
        $privacy = Cms::where(['slug' => 'privacy-policy', 'created_by'=>app('currentAgent')->id])->first();
        return view('front.privacy-policy', compact('privacy'));
    }
    public function terms_conditions(){
        $terms = Cms::where(['slug' => 'terms-and-conditions', 'created_by'=>app('currentAgent')->id])->first();
        return view('front.terms-conditions', compact('terms'));
    }
    public function data_deletion(){
        $data = Cms::where(['slug' => 'data-deletion', 'created_by'=>app('currentAgent')->id])->first();
        return view('front.data-deletion', compact('data'));
    }
    public function editorial_policy(){
        $editorials = Cms::where(['slug' =>  'editorial-policy', 'created_by'=>app('currentAgent')->id])->first();
        return view('front.editorial-policy', compact('editorials'));
    }
    public function cookie_policy(){
        $cookies = Cms::where(['slug' =>  'cookie-policy', 'created_by'=>app('currentAgent')->id])->first();
        return view('front.cookie-policy', compact('cookies'));
    }
    public function disclaimers(){
        $disclaimer = Cms::where(['slug'=> 'disclaimers', 'created_by'=>app('currentAgent')->id])->first();
        return view('front.disclaimers', compact('disclaimer'));
    }
    public function accessibility(){
        $access = Cms::where(['slug' => 'accessibility', 'created_by'=>app('currentAgent')->id])->first();
        return view('front.accessibility', compact('access'));
    }
    public function realtors(){
       return view('web.pages.realtors');
    }
    public function investors(){
       return view('web.pages.investors');
    }
    public function realtors_menu_popup(){
       return view('web.pages.realtors-menu-popup');
    }
    public function investors_menu_popup(){
       return view('web.pages.investors-menu-popup');
    }
    
    public function saveAffiliateEnquiry(Request $req)
    {
        // Validate request
        $req->validate([
            'first_name' => 'required|string|max:255',
            'email' => 'required|email',
            'contact_no' => 'required',
            'monthly_referrals' => 'nullable',
            'message' => 'nullable'
        ]);
     
        // Save the enquiry including current agent ID
        AffiliateEnquiryModel::create([
            'first_name' => $req->first_name,
            'email' => $req->email,
            'contact_no' => $req->contact_no,
            'monthly_referrals' => $req->monthly_referrals,
            'message' => $req->message,
            'agent_id' => optional(app('currentAgent'))->id,
        ]);
     
        // Redirect to specific URL with success message
        return redirect(url('/thank-you-affiliate'))
            ->with('success', 'Thank you! Your affiliate request has been submitted.');
        // return back()->with('success', 'Thank you! Your affiliate request has been submitted.');
    }
 
    public function submitForm(Request $request)
    {
        // Validate form (adjust fields as needed)
        $request->validate([
            'overall_experience' => 'required|integer',
            'recommend_rating' => 'required|integer',
            'easy_to_manage' => 'required|integer',
            'suggestion' => 'nullable|string',
        ]);
 
        // Insert into DB
        DB::table('tbl_app_feedback')->insert([
            'overall_experience' => $request->overall_experience,
            'recommend_rating' => $request->recommend_rating,
            'easy_to_manage' => $request->easy_to_manage,
            'suggestion' => $request->suggestion,
            'created_by' => auth()->id(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
 
        return redirect()->back()->with('success', 'Feedback submitted successfully!');
    }
    public function review(Request $request)
    {
        $request->validate([
            'rating'      => 'required|integer|min:1|max:5',
            'review_text' => 'required',
            // 'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
     
        // User Must be Logged In
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please login to submit a review.');
        }
     
        // Get user data
        $user = auth()->user();
     
        // Image upload
        // $imagePath = null;
        // if ($request->hasFile('image')) {
        //     $imageName = time() . '_' . $request->image->getClientOriginalName();
        //     $request->image->move(public_path('uploads/reviews'), $imageName);
        //     $imagePath = 'uploads/reviews/' . $imageName;
        // }
     
        // Insert into tbl_reviews
        DB::table('tbl_reviews')->insert([
            'name'        => $user->name,          // AUTO USER NAME
            'rating'      => $request->rating,
            'review_text' => $request->review_text,
            // 'image'       => $imagePath,
            'status'      => 1,
            'created_by'  => $user->id,            // LOGIN USER ID
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);
     
        return redirect()->back()->with('success', 'Thank you for your review!');
    }
 
    public function lead_magnet(Request $request)
    {
        // dd($request->post_headline_visible);
        // Validation (optional but recommended)
        $request->validate([
            'page_url' => 'required|string|max:255',
            'pre_headline' => 'required|string|max:255',
            'headline' => 'required|string|max:255',
            'post_headline' => 'nullable|string|max:255',
            'bullet1' => 'nullable|string|max:255',
            'bullet2' => 'nullable|string|max:255',
            'bullet3' => 'nullable|string|max:255',
            'bullet4' => 'nullable|string|max:255',
            'bullet5' => 'nullable|string|max:255',
            'bullet6' => 'nullable|string|max:255',
            'media_type' => 'nullable|string|max:50',
            'countdown_datetime' => 'nullable|date',
            'pre_cta' => 'nullable|string|max:255',
            'pre_cta_visible' => 'nullable',
            'ps_text' => 'nullable|string|max:255',
            'ps_text_visible' => 'nullable',

            'page_cta_url' => 'nullable|string|max:255',
            'popup_type' => 'nullable|in:1,2',
            'custom_form_id' => 'nullable|integer',
            'form_embed_code' => 'nullable|string',

            'enter_cta_url' => 'nullable|string|max:255',
            'cta_title' => 'nullable|string|max:255',
            'cta_sub_title' => 'nullable|string|max:255',

            'public_type' => 'nullable|in:pre-login,post-login',
        ]);
 
        // Checkbox handling: agar unchecked ho toh 0 set karo
        $data = $request->all();
        $checkboxes = [
            'pre_headline_visible',
            'headline_visible',
            'post_headline_visible',
            'bullet_status',
            'media_visible',
            'countdown_visible',
            'pre_cta_visible',
            'ps_text_visible',
            'popup_enable',
            'page_cta_url_visible',
            'page_new_tab',
            'is_public',
        ];
        if ($request->hasFile('media_path')) {
            // 👉 If updating, delete old file first
            if ($request->id) {
                $lead_data = LeadMagnetModel::find($request->id);
                if ($lead_data && $lead_data->media_path && file_exists(public_path($lead_data->media_path))) {
                    unlink(public_path($lead_data->media_path)); // 🔥 delete old file
                }
            }
            // 👉 Upload new file
            $uploadPath = public_path('uploads/lead_magnets');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            $file = $request->file('media_path');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move($uploadPath, $filename);
            $logoPath = 'uploads/lead_magnets/' . $filename;
        }
        foreach ($checkboxes as $cb) {
            $data[$cb] = $request->has($cb) ? 1 : 0;
        }
        $data['media_path'] = $logoPath ?? $request->media_path ?? null;
        $data['user_id'] = auth()->id();
        $data['agent_id'] = app('currentAgent')->id;
        // dd($data);
        // Save data to database
        if ($request->id) {
            $lead = LeadMagnetModel::find($request->id);

            if ($lead) {
                $lead->update($data);
            }

        } else {
            $lead = LeadMagnetModel::create($data);
        }
        // company details save
        
        $companylogoPath = null;
        if ($request->hasFile('company_logo')) {
            if ($request->id) {
                $company_details = LeadMagenetModel1::where('lead_magnet_id', $request->id)->first();
                if ($company_details && $company_details->company_logo && file_exists(public_path($company_details->company_logo))) {
                    unlink(public_path($company_details->company_logo)); // 🔥 delete old file
                }
            }
            // Make sure the uploads/company_logo folder exists
            $uploadPath = public_path('uploads/lead_magnets');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true); // recursive create
            }
     
            $file = $request->file('company_logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move($uploadPath, $filename);
     
            $companylogoPath = 'uploads/lead_magnets/' . $filename; // store relative path in DB
        }else{
            $company_details = LeadMagenetModel1::where('lead_magnet_id', $request->id)->first();
            $companylogoPath = $company_details->company_logo ?? null;
        }
        $company_details = LeadMagenetModel1::updateOrCreate(
            [
                'lead_magnet_id' => $lead->id // 🔥 condition
            ],
            [
                'company_name' => $request->company_name,
                'company_email' => $request->company_email,
                'company_phone' => $request->company_phone,
                'company_address' => $request->company_address,
                'company_website' => $request->company_website,
                'company_logo'    => $companylogoPath ?? null,
                'header_footer_bg_color' => $request->header_footer_bg_color,
                'button_bg_color' => $request->button_bg_color,
                'header_footer_text_color' => $request->header_footer_text_color,
                'button_text_color' => $request->button_text_color,
            ]
        );



        // Redirect back with success message
        return redirect()->route('lead-magnet-form')->with('success', 'Lead Magnet Saved Successfully!');
    }
    public function lead_magenet1(Request $request)
    {
        // Debug all request data
        // dd($request->all());
     
        // ================= Validation =================
        $request->validate([
            'company_name' => 'required|string|max:255',
            'company_email' => 'required|email|max:255',
            'company_phone' => 'nullable|string|max:20',
            'company_address' => 'nullable|string|max:500',
            'company_website' => 'nullable|string|max:255',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'header_footer_bg_color' => 'nullable|string|max:20',
            'button_bg_color' => 'nullable|string|max:20',
            'header_footer_text_color' => 'nullable|string|max:20',
            'button_text_color' => 'nullable|string|max:20',
        ]);
     
        // ================= File Upload =================
        
        if ($request->hasFile('company_logo')) {
     
            // Make sure the uploads/company_logo folder exists
            $uploadPath = public_path('uploads/company_logo');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true); // recursive create
            }
     
            $file = $request->file('company_logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move($uploadPath, $filename);
     
            $logoPath = 'uploads/company_logo/' . $filename; // store relative path in DB
        }else{
            $logoPath = null;
        }
     
        // ================= Save Data =================
        $lead = LeadMagenetModel1::create([
            'company_name' => $request->company_name,
            'company_email' => $request->company_email,
            'company_email_type' => $request->company_email_type,
            'company_phone' => $request->company_phone,
            'company_phone_type' => $request->company_phone_type,
            'company_address' => $request->company_address,
            'company_website' => $request->company_website,
            'company_logo' => $logoPath,
            'header_footer_bg_color' => $request->header_footer_bg_color,
            'button_bg_color' => $request->button_bg_color,
            'header_footer_text_color' => $request->header_footer_text_color,
            'button_text_color' => $request->button_text_color,
        ]);
     
        // Debug saved record
        // dd($lead);
     
        // Redirect back with success message
        return redirect()->back()->with('success', 'Company details saved successfully!');
    }

}