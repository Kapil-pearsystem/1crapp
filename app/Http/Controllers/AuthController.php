<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Mail\VerificationCodeMail;
use App\Mail\RegistrationSuccessfullyMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\JsonResponse;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserDetails;
use App\Models\UserSocialNetworks;
use App\Models\UserCompanyDetails;
use App\Models\UserWallet;
use App\Models\AgentReferrralSetting;
use App\Models\CdbPlanModel;
use Illuminate\Validation\ValidationException;
use App\Mail\UpdatePasswordMail;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function showRegistrationForm(Request $request)
    {
        Cache::put('agent_id', app('currentAgent')->id, 60);
        $referral = $request->query('referral', '');
        return view('front.registration',compact('referral'));
    }
    public function registrerStore(Request $request)
    {
        date_default_timezone_set('Asia/Kolkata');
        $currentTime = date('Y-m-d H:i:s');

        $email = $request->email;
        $password = $request->password;
        $created_at = $currentTime;
        $updated_at = $currentTime;

        // email check
        $exist = DB::table('users')->where('email', $email)->first();
        if(!empty($exist)){
            return redirect()->route('register')->with('fail', '<center>Hey, You are already a registered with us. <br><a href="'.url('login').'" style="color: blue;">Click here</a> to login!</center>');
        }

        $data = DB::table('users')->insert([
            'name' => $request->name,
            'email' => $email,
            'mobile' => $request->mobile,
            'password' => \Hash::make($password),
            'created_at' => $created_at,
            'updated_at' => $updated_at,
        ]);
        if (\Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('properties.list',['type'=>'buy-sale'])->with('success', 'Your registeration has been successful.');
        } else {
            return redirect()->route('register')->with('fail', 'Login details are not valid');
        }

    }

    public function showLoginForm()
    {
        // dd(app('subdomain'));
        // $agentId = app('currentAgent')->id;
        // echo "Agentid: ".$agentId;die;
        Cache::put('agent_id', app('currentAgent')->id, 60); // 60 minutes
        return view('front.login');
    }

    public function login(Request $request)
    {
        
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
        if ($validator->fails()) {
            // Redirect back with input and errors
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // Check if user exists by email or username
        $user = DB::table('users')
            ->where('email', $request->email)
            ->orWhere('user_name', $request->email)
            ->first();

        // Check if user exists
        if (is_null($user)) {
            return redirect()->route('login')->with('fail', 'No Such user with this email id exists in our record.<br> Please use the different email or <a class="text-info text-justify" href="'.route('register').'">Register</a> here for new account.');
        }

        // Check if user account is blocked
        if ($user->status == 0) {
            return redirect()->route('login')->with('fail', '<center>Your account has been Blocked by Administrator<br><a href="'.url('login').'" style="color: blue;">Click here</a> to learn more!</center>');
        }
        // dd($user);
        // Attempt to authenticate with the email or username and password
        if (\Auth::attempt(['email' => $request->email, 'password' => $request->password]) || \Auth::attempt(['user_name' => $request->email, 'password' => $request->password])) {
            $previous_loc = '';
            $previous_loc = Session::get('redirect_link');
            Session::put('redirect_link','');
            if($previous_loc != ''){
                return redirect()->away($previous_loc);
            }
            return redirect()->route('properties.list',['type'=>'buy-sale']);
        } else {
            return redirect()->route('login')->with('fail', 'Login details are not valid');
        }
    }


    public function home()
    {
        return view('front.home');
    }

    public function logout()
    {
        \Session::flush();
        \Auth::logout();
        return redirect('login');
    }

    // 03-09-2024
    public function save_register(Request $request){
        $is_referral = false;
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'mobile'=>'required',
            'password'=>'required',
            'security_code'=>'required',
        ], [
             'email.unique' => 'The email address you entered is already in use. Please try logging in <a class="text-info text-justify" href="'.route('login').'">Login</a> or use a different email address.'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $verification_code = Session::get('verification_code');
        if($verification_code != $request->security_code){
            return redirect()->back()->with('fail','Invalid Safe Code')->withErrors($validator)->withInput();
        }
        Session::put('verification_code', '');
        $member_id = $this->generate_member_id();
        $referred_by_id = NULL;
        if($request->referral_code){
        $referred_by_id = $this->register_by_referral($request->referral_code);
            if($referred_by_id == false){
                return redirect()->back()->with('fail','Invalid Referral Code!')->withErrors($validator)->withInput();
            }else{
                $is_referral = true;
            }
        }
        $plan_id = DB::table('cdb_plans')
        ->where('agent_id', app('currentAgent')->id)
        ->where('monthly_price', 0)
        ->value('id');
        $user = new User();
        $user->memberid = $member_id;
        $user->type = 1;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->password = \Hash::make($request->password);
        $user->recover_pass = base64_encode($request->password);
        $user->applied_referral = $request->referral_code;
        $user->applied_referral_userid = $referred_by_id;
        $user->agent_id = app('currentAgent')->id;
        $user->package_id = $plan_id;
        $user->valid_upto =  Carbon::now()->addDays(7);
        $user->created_at = now();
        $user->updated_at = now();
        DB::beginTransaction();
        try {
            $user->save();
            $this->welcome_bonus($user);
            if ($is_referral) {
                $this->referral_bonus($user);
            }
            DB::commit();
        } catch (\Exception $e) {
            return $e->getMessage();
            DB::rollback();
            return redirect()->route('register')->with('fail', 'Customer details are not valid');
        }

        if(\Auth::attempt($request->only('email', 'password'))) {

            $maildata = array();
            $maildata['name'] = $request->name;
            $maildata['email'] = $request->email;
            $maildata['mobile'] = $request->mobile;
            $maildata['password'] = $request->password;
            Mail::to($request->email)->send(new RegistrationSuccessfullyMail($maildata));
            return redirect()->route('properties.list',['type'=>'buy-sale'])->with('success', 'Your registeration has been successful.');
        } else {
            return redirect()->route('register')->with('fail', 'Customer details are not valid');
        }
    }
    // welcome bonus
    public function welcome_bonus($data)
    {
        $agent_id = $data->agent_id;
        $balance = $data->walletBalance;

        $referral_setting = AgentReferrralSetting::where('agent_id', $agent_id)->first();
        $bonusAmount = $referral_setting->welcome_bonus ?? 0;

        if ($bonusAmount <= 0) {
            return; // No bonus to apply
        }

        $userwallet = new UserWallet();
        $userwallet->txnid = 'TXN' . rand(11111111, 99999999);
        $userwallet->ownerAccount = $data->id;
        $userwallet->payeeAccount = $agent_id;
        $userwallet->txn_type = 1;
        $userwallet->type = 1;
        $userwallet->entryType = 'credit';
        $userwallet->base_amount = $bonusAmount;
        $userwallet->amount = $bonusAmount;
        $userwallet->previousBalance = $balance;
        $userwallet->updatedBalance = $balance + $bonusAmount;
        $userwallet->transfer_mode = 'welcome-bonus';
        $userwallet->comment = 'Welcome bonus of ₹' . $bonusAmount . ' has been credited to your wallet.';
        $userwallet->payment_data = json_encode($data);
        $userwallet->status = 1;
        $userwallet->created_at = now();
        $userwallet->updated_at = now();
        $userwallet->save();

        //  Update user's wallet balance
        $data->walletBalance += $bonusAmount;
        $data->save();
    }

    public function referral_bonus($data)
    {
        $agent_id = $data->agent_id;
        $sponsor_id = $data->applied_referral_userid;

        if (!$sponsor_id) {
            return; // No referral used
        }

        $sponsor = User::find($sponsor_id);
        if (!$sponsor) {
            return; // Invalid sponsor
        }

        $balance = $sponsor->walletBalance;

        $referral_setting = AgentReferrralSetting::where('agent_id', $agent_id)->first();
        $bonusAmount = $referral_setting->referral_points ?? 0;

        if ($bonusAmount <= 0) {
            return; // No bonus to apply
        }

        $userwallet = new UserWallet();
        $userwallet->txnid = 'TXN' . rand(11111111, 99999999);
        $userwallet->ownerAccount = $sponsor_id;
        $userwallet->payeeAccount = $agent_id;
        $userwallet->txn_type = 2;
        $userwallet->type = 1;
        $userwallet->entryType = 'credit';
        $userwallet->base_amount = $bonusAmount;
        $userwallet->amount = $bonusAmount;
        $userwallet->previousBalance = $balance;
        $userwallet->updatedBalance = $balance + $bonusAmount;
        $userwallet->transfer_mode = 'referral-bonus';
        $userwallet->comment = 'Referral bonus of ₹' . $bonusAmount . ' has been credited to your wallet for referring ' . $data->name . ' (' . $data->email . ').';
        $userwallet->payment_data = json_encode($data);
        $userwallet->status = 1;
        $userwallet->created_at = now();
        $userwallet->updated_at = now();
        $userwallet->save();

        //  Update sponsor's wallet balance
        $sponsor->walletBalance += $bonusAmount;
        $sponsor->save();
    }


    public function generate_member_id(){
        $mem_id = '1CRAPP-MEM'.rand(10000,99999);
        $user = User::where('memberid', $mem_id)->first();
        if(is_null($user)){
            return $mem_id;
        }else{
            $this->generate_member_id();
        }
    }
    public function register_by_referral($referral_code){
        $user = User::where('memberid', $referral_code)->first();
        if(!is_null($user)){
            return $user->id;
        }else{
            return false;
        }
    }
    public function sendCode(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'email' => 'required|email',
        ]);
        $token = Str::random(32);
        $code = rand(10000, 99999);
        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user = User::find($user->id);
            $user->otp = $code;
            $user->token = $token;
            $user->update();
            Session::put('verification_code', $code);

            $data = [
                'code' => $code,
                'source' => $request->source
            ];
            Mail::to($request->email)->send(new VerificationCodeMail($data));
            return response()->json([
                'token' => $token,
                'status' => true,
                'message' => 'Code received successfully!',
            ]);

        }else{
            // return response()->json([
            //     'status' => false,
            //     'message' => 'Invalid User!'
            // ]);
            return response()->json([
                'status' => false,
                'message' => 'No Such user with this email id exists in our record.<br> Please use the different email or <a class="text-info text-justify" href="'.route('register').'">Register</a> here for new account.'
            ]);
        }
    }
    public function email_verification(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email|unique:users,email',
        ]);
        if ($validator->fails()) {

            return response()->json([
                'status' => false,
                'message' => 'The email address you entered is already in use or invalid. Please try logging in <a class="text-info text-justify" href="'.route('login').'">Login</a>  or use a different email address.'
            ]);
        }
        $code = rand(10000, 99999);
        Session::put('verification_code', $code);
        $data = [
            'code' => $code,
            'source' => $request->source
        ];
        Mail::to($request->email)->send(new VerificationCodeMail($data));
        return response()->json([
            'otp' => $code,
            'status' => true,
            'message' => 'Code received successfully!',
        ]);

    }


    // facebook
    public function redirectToFacebook()
    {   
        Cache::put('preurl', previous_baseurl(), 60);
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        try {
            // Check if there is an error in the callback
            if (request()->has('error')) {
                return redirect()->route('login')->with('fail', 'Facebook login was canceled or denied.');
            }

            $randomString = bin2hex(random_bytes(16));
            $hashedString = password_hash($randomString, PASSWORD_BCRYPT);

            // $facebookUser = Socialite::driver('facebook')->stateless()->user();
            $facebookUser = Socialite::driver('facebook')
                            ->stateless()
                            ->scopes(['email']) // Request email permission
                            ->user();
            if (is_null($facebookUser->getId())) {
                return redirect()->route('login')->with('fail', 'Unable to retrieve Facebook user details.');
            }

            // Check if the user exists in your database
            $user = User::where('email', $facebookUser->getEmail())->first();
            // dd($facebookUser);
            if (is_null($facebookUser->getEmail())) {
                // Email is not available
                return redirect()->route('login')->with('fail', 'Facebook did not provide an email address. Please ensure your email is updated on Facebook.');
            }
            if (!$user) {
                // Register new user
                $user = new User();
                $user->memberid = $this->generate_member_id(); // Generate unique member ID
                $user->type = 1; // Set user type
                $user->name = $facebookUser->getName();
                $user->email = $facebookUser->getEmail();
                $user->password = $hashedString;
                $user->recover_pass = base64_encode($randomString);
                $user->facebook_id = $facebookUser->getId();
                $user->agent_id = Cache::get('agent_id');
                $user->created_at = now();
                $user->updated_at = now();
                DB::beginTransaction();
                try {
                    $user->save();
                    $this->welcome_bonus($user);
                    DB::commit();
                } catch (\Exception $e) {
                    dd($e->getMessage());
                    DB::rollback();
                    return redirect()->route('login')->with('fail', 'Customer details are not valid');
                }

                // Prepare email data
                // $maildata = [
                //     'name' => $user->name,
                //     'email' => $user->email,
                //     'mobile' => 'N/A',
                //     'password' => $randomString,
                // ];

                // Send welcome email (uncomment to enable)
                // Mail::to($user->email)->send(new RegistrationSuccessfullyMail($maildata));
            }

            // Log in the user
            return redirect()->to(rtrim(Cache::get('preurl'), '/') . '/social-login/' . $facebookUser->getId());
            // Auth::login($user);

            // return redirect()->route('properties.list', ['type' => 'buy-sale'])
                // ->with('success', 'Your registration has been successful.');
        } catch (\Laravel\Socialite\Two\InvalidStateException $e) {
            return redirect()->route('login')->with('error', 'Invalid state. Please try again.');
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Something went wrong. Please try again.');
        }
    }


    // google login
    public function redirectToGoogle()
    {
        Cache::put('preurl', previous_baseurl(), 60);
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        
        try {
            // Check if there is an error in the callback
            if (request()->has('error')) {
                // Redirect to a page with a proper error message
                return redirect()->to(previous_baseurl())->with('error', 'Google login was canceled or denied.');
            }
             
            $randomString = bin2hex(random_bytes(16));
            $hashedString = password_hash($randomString, PASSWORD_BCRYPT);

            // $googleUser = Socialite::driver('google')->user();
            $googleUser = Socialite::driver('google')->redirectUrl("https://" . request()->getHost() . "/auth/google/callback")->user();
           
            if (is_null($googleUser->getId())) {
                return redirect()->to(previous_baseurl())->with('error', 'Unable to retrieve Google user details.');
            }

            // Check if the user exists in your database
            $user = User::where('email', $googleUser->getEmail())->first();
            // dd($googleUser);
            if (is_null($user)) {
                // Register new user
                $user = new User();
                $user->memberid = $this->generate_member_id();
                $user->type = 1;
                $user->name = $googleUser->getName();
                $user->email = $googleUser->getEmail();
                $user->password = $hashedString;
                $user->recover_pass = base64_encode($randomString);
                $user->google_id = $googleUser->getId();
                $user->agent_id = Cache::get('agent_id');
                $user->created_at = now();
                $user->updated_at = now();
                DB::beginTransaction();
                try {
                    $user->save();
                    $this->welcome_bonus($user);
                    DB::commit();
                } catch (\Exception $e) {
                    DB::rollback();
                    return redirect()->route('register')->with('fail', 'Customer details are not valid');
                }
                // $maildata = array();
                // $maildata['name'] = $googleUser->getName();
                // $maildata['email'] = $googleUser->getEmail();
                // $maildata['mobile'] = NULL;
                // $maildata['password'] = $randomString;
                // // Send a welcome email (uncomment the below line to enable)
                // Mail::to($googleUser->getEmail())->send(new RegistrationSuccessfullyMail($maildata));
               
            }
            return redirect()->to(rtrim(Cache::get('preurl'), '/') . '/social-login/' . $googleUser->getId());
            
        } catch (\Laravel\Socialite\Two\InvalidStateException $e) {
            return redirect()->route('login')->with('error', 'Invalid state. Please try again.');
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Something went wrong. Please try again.');
        }
    }
    public function sociallogin($client_id){
        // dd($google_client_id);
        $user = User::where('google_id', $client_id)->orWhere('facebook_id', $client_id)->first();
        Auth::login($user);
        $red_url = Cache::get('preurl'). '/properties/buy-sale/list';
        return redirect()->to($red_url)->with('success', 'Your registration has been successful.');
    }

    public function test_mail(){
        // Mail::raw('Test email body', function ($message) {
        //     $message->to('22k@yopmail.com')
        //             ->subject('Test Email');
        // });
        // $host = config('mail.mailers.smtp.host');
        // $username = config('mail.mailers.smtp.username');
        // $from = config('mail.from.address');

        // return response()->json([
        //     'host' => $host,
        //     'username' => $username,
        //     'from' => $from,
        // ]);
        $data = [
            'code' => '1234 -> for 22k@yopmail.com',
            'source' => 'test'
        ];
        try {
            Mail::to('22k@yopmail.com')->send(new VerificationCodeMail($data));
            // Mail::to('kapil@pearsystem.in')->send(new VerificationCodeMail($data));
            return response()->json(['status' => 'success', 'message' => 'Verification code sent successfully!']);
        } catch (Exception $e) {
            // Log the exception message
            \Log::error('Mail sending failed: ' . $e->getMessage());

            // Return or display the exception message
            return response()->json(['status' => 'error', 'message' => 'Failed to send email: ' . $e->getMessage()]);
        }
    }
    public function show_mail_templet(){
        $data['code'] =  1234;
        $data['source'] =  'register';
       return view('front.Mail.verification-code',compact('data'));
    }
    function my_profile(){
        $user = User::select('users.profile_image as user_profile','users.*','user_details.*','user_company_details.*','user_social_networks.*')
        ->leftjoin('user_details','user_details.user_id','=','users.id')
        ->leftjoin('user_company_details','user_company_details.user_id','=','users.id')
        ->leftjoin('user_social_networks','user_social_networks.user_id','=','users.id')
        ->where('users.id', Auth::id())->first();
        $cdb_plans = CdbPlanModel::where(['status' => 1, 'agent_id'=>app('currentAgent')->id])->orderBy('id', 'ASC')->get();
        // dd($cdb_plans);
        $names = get_all_name($user->name);
        $user->first_name = $names['first_name'];
        $user->middle_name = $names['middle_name'];
        $user->last_name = $names['last_name'];
        // dd($user);
        return view('dashboard.my-profile',compact('user','cdb_plans'));
    }
    public function save_user_details(Request $request){
        $validator = Validator::make($request->all(),[
            'user_name'        => 'required|unique:users,user_name,' . Auth::id(), // Exclude the current user ID
            'email'           => 'required|email|unique:users,email,' . Auth::id(), // Exclude current user email
            'first_name'=>'required',
            'last_name'=>'required',
            'mobile'=>'required',
        ],[
            'user_name.unique' => 'This user name does not exist in our system. Or has already been taken.'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // ------------------user table---------------------
        if(!empty($request->profile)){
            $file = time().'.'.$request->profile->extension();
            $request->profile->move(public_path('uploads/profile/'), $file);
            $file_name = 'uploads/profile/'.$file;
        }else{
            $file_name = $request->input('old_profile');
        }
        $user = User::find(Auth::id());
        $user->user_name = $request->user_name;
        $user->email = $request->email;
        $user->name = trim($request->first_name).' '.trim($request->middle_name).' '.trim($request->last_name);
        $user->mobile = $request->mobile;
        $user->profile_image = $file_name; // need to work
        $user->save();
        $userDetails = UserDetails::updateOrCreate(
            ['user_id' => Auth::id()], // Condition to check
            [
                'official_email' => $request->official_email,
                'personal_website' => $request->personal_website,
                'country' => $request->country,
                'state' => $request->state,
                'city' => $request->city,
                'address' => $request->address,
                'zip' => $request->zip,
                'phone' => $request->phone,
                'dob' => $request->dob,
                'spouse_dob' => $request->spouse_dob,
                'anniversary' => $request->anniversary,
                'no_of_childrens' => $request->no_of_childrens,
                'worked_in' => $request->worked_in,
                'status' => 1,
            ]
        );
        return redirect()->back()->with('success','User details updated successfully!');
    }
    public function save_company_details(Request $request){
        // dd($request->all());
        // $validator = Validator::make($request->all(),[
        //     'company_name'=>'required',
        //     'company_email'=>'required',
        //     'company_email_type'=>'required',
        //     'company_phone'=>'required',
        //     'company_phone_type'=>'required',
        //     'company_address'=>'required',
        //     'company_website'=>'required'
        // ]);
        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }
        if(!empty($request->company_logo)){
            $file = time().'.'.$request->company_logo->extension();
            $request->company_logo->move(public_path('uploads/profile/'), $file);
            $file_name = 'uploads/profile/'.$file;
        }else{
            $file_name = $request->input('old_company_logo');
        }
        $res = UserCompanyDetails::updateOrCreate(
            ['user_id' => Auth::id()], // Condition to check
            [
                'company_name' => $request->company_name,
                'company_email' => $request->company_email,
                'company_email_type' => $request->company_email_type,
                'company_phone' => $request->company_phone,
                'company_phone_type' => $request->company_phone_type,
                'company_address' => $request->company_address,
                'company_website' => $request->company_website,
                'company_logo' => $file_name,
                'status' => 1,
            ]
        );
        return redirect()->back()->with('company-success','Company details updated successfully!');
    }
    public function update_password(Request $request)
    {
        // Validate the input fields
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|min:8',
        ]);

        // Check if the current password matches the user's password
        if (!\Hash::check($request->current_password, Auth::user()->password)) {
            throw ValidationException::withMessages([
                'current_password' => ['The current password is incorrect.'],
            ]);
        }
        if($request->new_password != $request->confirm_password){
            return back()->with('password-error', 'The new password confirmation does not match.');
        }
        // Update the user's password
        Auth::user()->update([
            'password' => \Hash::make($request->new_password),
            'recover_pass' => base64_encode($request->new_password)
        ]);
         // -------------------mail-------------------------------
         $user = User::where('id', Auth::id())->first();
         $data['name'] = $user->name;
         $data['email'] = $user->email;
         $data['password'] = $request->input('new_password');
         // dd($user);
          Mail::to($user->email)->send(new UpdatePasswordMail($data));
          // -------------------mail-------------------------------
        return back()->with('password-success', 'Password updated successfully.');
    }
    public function update_social_network(Request $request){
        $res = UserSocialNetworks::updateOrCreate(
            ['user_id' => Auth::id()], // Condition to check
            [
                'facebook' => $request->facebook,
                'youtube' => $request->youtube,
                'linkedin' => $request->linkedin,
                'twitter' => $request->twitter,
                'telegram' => $request->telegram,
                'skype' => $request->skype,
                'instagram' => $request->instagram,
                'other' => $request->other,
                'status' => 1,
            ]
        );
        return redirect()->back()->with('social-success','Social Networks updated successfully!');
    }
    public function check_username(Request $request){
        $request->validate([
            'username' => 'required',
        ]);
        $user = DB::table('users')
        ->where('user_name', $request->username)
        ->where('id', '!=', Auth::id())
        ->first();

        // Check if user exists
        if (is_null($user)) {
            return response()->json([
                'status' => true,
            ]);
        }else{
            return response()->json([
                'status' => false,
            ]);
        }
    }
    public function setting(){
        return view('dashboard.setting');
    }
}