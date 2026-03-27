<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
}
