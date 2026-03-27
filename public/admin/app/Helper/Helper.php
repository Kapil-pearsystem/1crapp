<?php

namespace App\Helper;

use App\Models\Customer;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;
use App\Models\PlanPermissionModel;
use Illuminate\Support\Facades\Auth;

class Helper
{
    // unique company id generator
    public static function getUniqueCompanyID()
    {
        $number = mt_rand(100000, 999999);
        if (self::companyIDExists($number)) {
            return self::getUniqueCompanyID();
        }

        return $number;
    }

    public static function companyIDExists($number)
    {
        return \App\Models\User::where('company_id', $number)->exists();
    }

    public static function sendEmail($emailAddress, $title, $emailData)
    {
        Mail::send('mails.mailTemplate', ['data' => $emailData], function ($message) use ($emailAddress, $title) {
            $message->from(env('MAIL_FROM_ADDRESS'), env('APP_NAME'));
            $message->to($emailAddress);
            $message->subject($title);
        });
    }

    public static function getMyCustomer($id)
    {
        return Customer::where('agent_id', $id)->select('id')->orderBy('id', 'DESC')->count();
    }

    // ✅ New method to get cleaned URI
    public static function cleanUri()
    {
        $uri = trim(request()->path(), '/'); // e.g. admin/banner/edit/3
        // dd($uri);
        // for smtp only
        if (str_starts_with($uri, 'smtp/')) {
            $segments = explode('/', $uri);
            return $segments[0]; // return 'smtp'
        }
        if (str_starts_with($uri, 'notification/')) {
            $segments = explode('/', $uri);
            return implode('/', array_slice($segments, 0, 3));
        }
        if (str_starts_with($uri, 'admin/')) {
            $uri = substr($uri, strlen('admin/')); // e.g. banner/edit/3
        }

        $segments = explode('/', $uri);
        return implode('/', array_slice($segments, 0, 2)); // e.g. banner/edit
    }
   
    public static function hasPermission()
    {
        $package = \App\Models\AgentDetail::where('user_id', auth()->id())->first();
        // dd($package);
        if(!Auth()->user()->hasrole('Agent')){
            return true;
        }
         // Only check for GET requests
        if (request()->method() !== 'GET') {
            return true;
        }
        if(!isset($package) && !isset($package->package)) {
            return false;
        }
        // dd($package);

        $permission = self::cleanUri();
        // dd($permission);
        $permissions = session('agent_permissions', []);
        if (empty($permissions) && Auth::check()) {
           $permissions = PlanPermissionModel::pluck('permission')->unique()->values()->toArray();
            session(['user_permissions' => $permissions]); // Store in session
        }
        return collect($permissions)->contains(function ($perm) use ($permission) {
            return $perm === $permission || str_starts_with($permission, $perm);
        });
        // return in_array($permission, $permissions);

    }

}
