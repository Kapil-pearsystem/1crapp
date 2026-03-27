<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\LoginWithoutPasswordMail;

class LoginWithoutPasswordController extends Controller
{
    public function ShowloginWithoutPassword()
    {
        return view('front.login-without-password');
    }
    public function login_without_password(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email'=>'required',
            'safe_code'=>'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // tese safe code
        $verification_code = Session::get('verification_code');
        if($verification_code != $request->safe_code){
            return redirect()->back()->with('error','Invalid Safe Code')->withErrors($validator)->withInput();
        }
        Session::put('verification_code', '');
        // tese safe code

        date_default_timezone_set('Asia/Kolkata');
        $currentTime = date('Y-m-d H:i:s');
        $email = $request->email;
        $user = User::where('email', $email)->first();
        if ($user) {
            $token = Str::random(32); //generete random token 
            $otp = rand(10000, 99999); //generete random otp 
            $user = User::find($user->id);
            $user->otp = $otp;
            $user->token = $token;
            $user->update();
            $resetData['token'] = $token;
            $resetData['email'] = $user->email;
            $data['otp'] = $otp;
            Mail::to($request->email)->send(new LoginWithoutPasswordMail($data));
            return view('front.login-otp', compact('resetData'));
        } else {
            return redirect()->route('login-without-password')->with('fail', 'Please enter valid email!');
        }
    }
    public function login_by_otp(Request $request)
    {
        date_default_timezone_set('Asia/Kolkata');
        $currentTime = date('Y-m-d H:i:s');
        // $otp = $request->one;
        // $userotp = implode("", $otp);
        $userotp = $request->safe_code;
        $token = $request->token;
        $loginData = array();

        $user = User::where('token', $token)->first();
        if ($user) {
            $loginData['email'] = $user->email;
            $loginData['password'] = $user->password;
            if ($user->otp == $userotp) {
                if (Auth::loginUsingId($user->id)) {
                    return redirect()->route('property-list',['buy_and_sell'])->with('success', 'You are successfully logged in.');
                } else {
                    return redirect()->route('login-without-password')->with('fail', 'Login Failed!');
                }
            } else {
                return redirect()->route('login-without-password')->with('fail', 'Invalid otp!');
            }
        } else {
            return redirect()->route('login-without-password')->with('fail', 'Please enter valid email!');
        }

    }

}