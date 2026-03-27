<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ConstantsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        define('WEB_BASE_URL', 'https://admin.1crapp.com/');
    }
    public function register()
    {
        //
    }
}
?>
