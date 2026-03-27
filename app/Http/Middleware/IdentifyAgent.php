<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Agent;

class IdentifyAgent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $host       = $request->getHost();
        $subdomain  = check_subdomain();     // whichever logic you have
        $baseUrl    = env('BASE_URL');
        $agent      = null;
        
        $agent = Agent::where('custom_domain', $host)->first();
        
        if (!$agent && $subdomain) {
            $agent = Agent::where('subdomain', $subdomain)->first();
        }
        if (!$agent) {
            
            // redirect if not base domain (avoid loops)
            // dd($request->fullUrl());
            // if ($request->fullUrl() != $baseUrl) {
            //     return redirect()->to($baseUrl);
            // }
            if (!str_contains($request->fullUrl(), $baseUrl)) {
                return redirect()->to($baseUrl);
            }

            // fallback master admin (id=8)
            $agent = Agent::find(8);
            // if fallback also missing, redirect
            if (!$agent) {
                return redirect()->to($baseUrl);
            }
        }
        app()->instance('currentAgent', $agent);
        
        return $next($request);
    }

}
