<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppConstantsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        define('ASSETS_PATH', 'https://1crapp.com/admin/');
    }

    public function register()
    {
        //
    }
}
