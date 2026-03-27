<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Auth;
use Illuminate\Support\Facades\Mail;

class LoginWithoutPasswordController extends Controller
{
    public function ShowloginWithoutPassword()
    {
        return view('front.login-without-password');
    }
    public function login_without_password(Request $request)
    {
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

            // $data = array('otp' => $otp);
            $from = env('MAIL_USERNAME');
            $to = $user->email;
            $subject = 'Verification code';
            Mail::send(
                'front.Mail.otp-send',
                compact('otp'),
                function ($mail) use ($to, $from, $subject) {
                    $mail->to($to)
                        ->from($from)
                        ->subject($subject);
                }
            );

            return view('front.login-otp', compact('resetData'));
        } else {
            return redirect()->route('login-without-password')->with('fail', 'Please enter valid email!');
        }
    }
    public function login_by_otp(Request $request)
    {
        date_default_timezone_set('Asia/Kolkata');
        $currentTime = date('Y-m-d H:i:s');
        $otp = $request->one;
        $userotp = implode("", $otp);
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