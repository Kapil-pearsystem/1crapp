<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Models\SmtpSetting;
use App\Models\User;
use App\Helper\Helper;
use Illuminate\Support\Facades\Auth;

class LoadMailConfig
{
    public function handle(Request $request, Closure $next)
    {
        // $host       = $request->getHost();
        // $subdomain  = Helper::check_subdomain();     // whichever logic you have
        // $baseUrl    = env('BASE_URL');
        // $agent      = null;

        // $routeMiddlewares = $request->route()->gatherMiddleware();

        
        // $agent = User::where('custom_domain', $host)->first();
        // if (!in_array('auth', $routeMiddlewares)) {
        //     $agent = User::find(8);
        // }
        // if (!$agent && $subdomain) {
        //     $agent = User::where('subdomain', $subdomain)->first();
        // }
        // if (!$agent) {
            
        //     if (!str_contains($request->fullUrl(), $baseUrl)) {
        //         return redirect()->to($baseUrl);
        //     }
        //     $agent = User::find(8);
        //     if (!$agent) {
        //         return redirect()->to($baseUrl);
        //     }
        // }
        // app()->instance('currentAgent', $agent);
        // $mailConfig = SmtpSetting::where('user_id', $agent->id)->first();
        // // dd($mailConfig);
        // if ($mailConfig) {
        //     // Set dynamic configuration
        //     Config::set('mail.mailers.smtp.host', $mailConfig->host);
        //     Config::set('mail.mailers.smtp.port', $mailConfig->port);
        //     Config::set('mail.mailers.smtp.username', $mailConfig->username);
        //     Config::set('mail.mailers.smtp.password', $mailConfig->password);
        //     Config::set('mail.mailers.smtp.encryption', $mailConfig->enc_type);
        //     Config::set('mail.from.address', $mailConfig->from_address);
        //     Config::set('mail.from.name', $mailConfig->from_name);
        // } else {
        //     // Set blank configuration
        //     Config::set('mail.mailers.smtp.host', '');
        //     Config::set('mail.mailers.smtp.port', '');
        //     Config::set('mail.mailers.smtp.username', '');
        //     Config::set('mail.mailers.smtp.password', '');
        //     Config::set('mail.mailers.smtp.encryption', '');
        //     Config::set('mail.from.address', '');
        //     Config::set('mail.from.name', '');
        // }

        return $next($request);
    }
}