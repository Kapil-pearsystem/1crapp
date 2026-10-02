<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\PasswordOtpMail;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    /**
     * Handle an login attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $sub_domain = $request->sb_dom;
        
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        // check if user is blocked
        $user = DB::table('agents')->where('email', $request->email)->first();
        if (!$user) {
            return redirect()->route('login')
                ->with('error', 'Account not found.');
        }
        if($user->id != 8){
            if (empty($user->valid_upto) || Carbon::parse($user->valid_upto)->isPast()) {
                return redirect()->route('login')->with(
                    'error',
                    'Your subscription plan has expired. Please upgrade to continue.'
                );
            }
        }
        if ($user && $user->role_id == 2) {
            // If custom domain exists
            if ($user->custom_domain) {
                if ($user->custom_domain != $sub_domain) {
                    return redirect()->route('login')->with('error', '<center>Invalid credentials.</center>');
                }
            } else {
                $subdomain = explode('.', $sub_domain)[0];
                if (!$subdomain || $user->subdomain != $subdomain) {
                    return redirect()->route('login')->with('error', '<center>Invalid credentials.</center>');
                }
            }
        } else {
            $subdomain = explode('.', $sub_domain)[0] ?? '';
            if (!$subdomain || $subdomain != 'admin') {
                return redirect()->route('login')->with('error', '<center>Invalid credentials.</center>');
            }
        }

        // echo "<pre>".print_r($user, true);die;
        if($user and $user->status == 0){
            return redirect()->route('login')->with('error', '<center>Your account has been Blocked by Administrator<br><a href="'.url('login').'" style="color: blue;">Click here</a> to learn more!</center>');
        }
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('home');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function login_withoutPassword(){
        return view('auth.login-without-password');
    }
    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        if (!$user) {
            return response()->json([
                'message' => 'Email not found.'
            ], 422);
        }
    
        // Check resend timer
        if ($user->otp_sent_at &&
            now()->diffInSeconds($user->otp_sent_at) < 120) {
    
            $remaining = 120 - now()->diffInSeconds($user->otp_sent_at);
    
            return response()->json([
                'message' => 'Please wait before requesting another OTP.',
                'remaining' => $remaining
            ], 429);
        }
    
        $otp = rand(100000, 999999);
    
        $user->otp = $otp;
        $user->otp_expire_at = now()->addMinutes(10);
        $user->otp_sent_at = now();
        $user->save();
    
        $data = [
            'name' => $user->name,
            'otp'  => $otp,
        ];
    
        Mail::to($user->email)->send(new PasswordOtpMail($data));
    
        return response()->json([
            'message' => 'OTP sent successfully.',
            'remaining' => 120
        ]);
    }
    
    public function login_by_otp(Request $request)
    {
        $sub_domain = $request->sb_dom;

        $request->validate([
            'email' => ['required', 'email'],
            'otp'   => ['required']
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'Account not found.');
        }

        // OTP validation
        if (empty($user->otp)) {
            return back()->with('error', 'OTP not found.');
        }

        if ($user->otp != $request->otp) {
            return back()->with('error', 'Invalid OTP.');
        }

        if (!$user->otp_expire_at || Carbon::parse($user->otp_expire_at)->isPast()) {
            return back()->with('error', 'OTP has expired.');
        }

        // Subscription validation
        if ($user->id != 8) {
            if (empty($user->valid_upto) ||
                Carbon::parse($user->valid_upto)->isPast()) {

                return back()->with(
                    'error',
                    'Your subscription plan has expired. Please upgrade to continue.'
                );
            }
        }

        // Subdomain validation
        if ($user->role_id == 2) {

            if ($user->custom_domain) {

                if ($user->custom_domain != $sub_domain) {
                    return back()->with(
                        'error',
                        '<center>Invalid credentials.1</center>'
                    );
                }

            } else {

                $subdomain = explode('.', $sub_domain)[0];
                // dd('Current'.$subdomain, 'Exists'.$user->subdomain);
                if (!$subdomain || $user->subdomain != $subdomain) {
                    return back()->with(
                        'error',
                        '<center>Invalid credentials.2</center>'
                    );
                }
            }

        } else {

            $subdomain = explode('.', $sub_domain)[0] ?? '';

            if (!$subdomain || $subdomain != 'admin') {
                return back()->with(
                    'error',
                    '<center>Invalid credentials.3</center>'
                );
            }
        }

        // Blocked account
        if ($user->status == 0) {
            return back()->with(
                'error',
                '<center>Your account has been Blocked by Administrator<br>
                <a href="' . url('login') . '" style="color: blue;">
                Click here</a> to learn more!</center>'
            );
        }

        // Clear OTP after login
        $user->otp = null;
        $user->otp_expire_at = null;
        $user->otp_sent_at = null;
        $user->save();

        Auth::login($user);

        $request->session()->regenerate();

        return redirect()->intended('home');
    }
    public function recover_password(){
        return view('auth.recover-password');
    }
    public function recoverOldPassword(Request $request){
        dd($request->all());
    }
}
