<?php

namespace App\Http\Controllers\rms;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function __construct()
    {
        
    }
    public function index(){
        if (Session::has('tenent_login')) {
            return redirect()->route('rms.dashboard');
        }
        return view('rms.login');
    }
    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|digits:4',
        ]);
        // dd($validatedData);
        $username = $request->username;

        $tenant = DB::table('rms_tenants')
            ->where(function ($query) use ($username) {
                $query->where('email', $username)
                    ->orWhere('mobile', $username);
            })
            ->where('status', 1)
            ->first();

        if (!$tenant) {
            return redirect()->back()->with('error', 'Invalid Credentials!');
        }

        if (!Hash::check($request->password, $tenant->password)) {
            return redirect()->back()->with('error', 'Invalid Credentials!');
        }

        $sessdata = [
            'id'     => $tenant->id,
            'name'   => $tenant->name,
            'email'  => $tenant->email,
            'mobile' => $tenant->mobile,
            'project_id'  => $tenant->project_id,
            'shop_id'  => $tenant->shop_id,
        ];
        Session::put('tenent_login', $sessdata);
        return redirect()->to('rms/dashboard');
    }
    public function logout(Request $request)
    {
        Session::forget('tenent_login');
        return redirect()->to('rms/login')->with('success', 'Logged out successfully!');
    }
}