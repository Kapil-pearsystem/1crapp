<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\CdbFeature;

class CdbFeaturesController extends Controller
{
    public function index()
    {
        $routes = Route::getRoutes();
    
        $saved = 0;
    
        /*
        |--------------------------------------------------------------------------
        | Routes to Skip
        |--------------------------------------------------------------------------
        */
        $skipRoutes = [
            'features',
            'faq',
            'how-it-works',
            'home',
            'login',
            'register',
            'forgot-password',
            'reset-password',
            'login-without-password',
            'billing',
            'social-login',
            'privacy-policy',
            'check-authorization',
            'cookie-policy',
            'terms-conditions',
            'about-us',
            'help',
            'market-place-list',
            'meet-team',
            'cdb-features',
            'logout',
            'setting',
            'my-profile',
            '404',
        ];
    
        foreach ($routes as $route) {
    
            // Only GET routes
            if (!in_array('GET', $route->methods())) {
                continue;
            }
    
            $routeName = $route->getName();
            $uri       = $route->uri();
    
            // Skip routes without name
            if (!$routeName) {
                continue;
            }
    
            // Skip custom excluded routes
            if (in_array($routeName, $skipRoutes)) {
                continue;
            }
    
            // Skip internal/debug routes
            if (
                str_contains($uri, '_debugbar') ||
                str_contains($uri, 'sanctum') ||
                str_contains($uri, 'ignition')
            ) {
                continue;
            }
    
            // Convert Route Name to Path
            $path = str_replace('.', '/', $routeName);
    
            // Convert Route Name to Title
            $parts = explode('.', $routeName);
    
            $formattedParts = array_map(function ($part) {
                return ucwords(str_replace('-', ' ', $part));
            }, $parts);
    
            $title = implode(' >> ', $formattedParts);
    
            // Prevent duplicate insert
            $exists = CdbFeature::where('path', $path)->exists();
    
            if (!$exists) {
                CdbFeature::create([
                    'title' => $title,
                    'path'  => $path
                ]);
    
                $saved++;
            }
        }
    
        return response()->json([
            'status'  => true,
            'message' => "$saved routes saved successfully."
        ]);
    }


}
