<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class PlanPermissionController extends Controller
{
    public function index(){
        // Step 1: Collect unique route prefixes having auth + plan_permission
        $prefixes = collect(Route::getRoutes())
            ->filter(function ($route) {
    
                $middlewares = $route->middleware();
    
                return in_array('GET', $route->methods())
                    && in_array('web', $middlewares)
                    && in_array('auth', $middlewares)
                    && in_array('plan_permission', $middlewares)
                    && !empty($route->getPrefix());
            })
            ->map(function ($route) {
                return trim($route->getPrefix(), '/');
            })
            ->unique()
            ->values();
    
        // Step 2: Convert prefixes into feature structure
        $planFeatures = $prefixes
            ->map(function ($prefix) {
    
                // Only first segment as module
                $segments = explode('/', $prefix);
                $module = ucfirst(str_replace('-', ' ', $segments[0]));
    
                return [
                    'module'      => $module,
                    'feature_key' => $prefix,
                ];
            })
            ->groupBy('module');
    
        return view('plan-permission.index', [
            'admin'            => 1,
            'planfeature'      => $planFeatures,
            'selectedFeatures' => [] // for edit case
        ]);
    }
    
    


}

