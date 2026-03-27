<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Mail\ForgotPasswordMail;
use App\Mail\UpdatePasswordMail;
use App\Mail\RecoverPasswordMail;

class ForgotPasswordController extends Controller
{
    public function ShowForgotPassword()
    {
        return view('front.forgot-password');
    }
    public function forgot_password(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email'=>'required',
            'security_code'=>'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        date_default_timezone_set('Asia/Kolkata');
        $currentTime = date('Y-m-d H:i:s');

        $email = $request->email;
        $verification_code = Session::get('verification_code');
        if($verification_code != $request->security_code){
            return redirect()->back()->with('error','Invalid Safe Code')->withErrors($validator)->withInput();
        }
        Session::put('verification_code', '');
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
            $resetData['otp'] = $otp;
            // -------------------mail-------------------------------
            Mail::to($request->email)->send(new ForgotPasswordMail($resetData));
            // -------------------mail-------------------------------
            return view('front.reset-password', compact('resetData'));
        } else {
            return redirect()->route('forgot-password')->with('fail', 'Please enter valid email!');
        }

    }
    public function reset_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'security_code' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        date_default_timezone_set('Asia/Kolkata');
        $currentTime = date('Y-m-d H:i:s');
        // $otp = $request->one;
        // $userotp = implode("", $otp);
        $userotp = $request->security_code;
        $token = $request->token;
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if ($user->otp == $userotp) {

                // echo 'success';
                return view('front.change-password',compact('token'));
            } else {
                return redirect()->route('forgot-password')->with('fail', 'Invalid otp!');
            }
        } else {
            return redirect()->route('forgot-password')->with('fail', 'Please enter valid email!');
        }

    }

    public function ShowResetPassword()
    {
        return view('front.reset-password');
    }
    public function update_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'new_password' => 'required',
            'confirm_password' => 'required'
        ]);
        if($request->new_password != $request->confirm_password){
            return redirect()->back()
                ->withErrors($validator) 
                ->withInput(); 
        }
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator) 
                ->withInput(); 
        }
        $token = $request->user_token;
        $user = User::where('token', $token)->first();
        $user->password = \Hash::make($request->input('new_password'));
        $user->recover_pass = base64_encode($request->new_password);
        $user->save();
        
         // -------------------mail-------------------------------
         $data['name'] = $user->name;
         $data['email'] = $user->email;
         $data['password'] = $request->input('new_password');
         // dd($user);
          Mail::to($user->email)->send(new UpdatePasswordMail($data));
          // -------------------mail-------------------------------
        return redirect()->route('login')->with('success', 'Password updated successfully!');
    
    }
    public function recover_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'security_code' => 'required',
        ]);
        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Please enter email and Security Code!'
            ]);
        }
    
        // Retrieve the stored verification code from session
        $verification_code = Session::get('verification_code');
        
        // Debugging: Check if verification_code exists
        if (!$verification_code) {
            return response()->json([
                'status' => false,
                'message' => 'No security code found in session.'
            ]);
        }
    
        // Check if the provided security code matches the one in session
        if ($verification_code != $request->security_code) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid Security Code!'
            ]);
        } else {
            // Clear the verification code after it's used
            Session::forget('verification_code');
        }
    
        $user = User::where('email', $request->email)->first();
        if ($user) {
            // Send verification email or other logic
            $mailData  = array();
            $mailData['name'] = $user->name;
            $mailData['email'] = $user->email;
            $mailData['password'] = base64_decode($user->recover_pass);
            Mail::to($request->email)->send(new RecoverPasswordMail($mailData));
            return response()->json([
                'status' => true,
                'message' => 'Password Recovered successfully On your mail!'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Invalid User!'
            ]);
        }
    }
    
}