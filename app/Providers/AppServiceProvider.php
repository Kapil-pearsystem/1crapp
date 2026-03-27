<?php

namespace App\Providers;
use App\Models\SmtpSetting;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // \URL::forceScheme('https');
        // $agentId = app('currentAgent')->id;
        // echo "Agentid: ".$agentId;die;
        $this->setDynamicMailConfig(78);
        //
    }
    public function setDynamicMailConfig($user_id)
    {
        // Fetch the mail config from the database for the user
        $mailConfig = SmtpSetting::where('user_id', $user_id)->first();

        // Check if the configuration exists
        if ($mailConfig) {
            // Set dynamic configuration
            Config::set('mail.mailers.smtp.host', $mailConfig->host);
            Config::set('mail.mailers.smtp.port', $mailConfig->port);
            Config::set('mail.mailers.smtp.username', $mailConfig->username);
            Config::set('mail.mailers.smtp.password', $mailConfig->password);
            Config::set('mail.mailers.smtp.encryption', $mailConfig->enc_type);
            Config::set('mail.from.address', $mailConfig->from_address);
            Config::set('mail.from.name', $mailConfig->from_name);
        } else {
            // Set blank configuration
            Config::set('mail.mailers.smtp.host', '');
            Config::set('mail.mailers.smtp.port', '');
            Config::set('mail.mailers.smtp.username', '');
            Config::set('mail.mailers.smtp.password', '');
            Config::set('mail.mailers.smtp.encryption', '');
            Config::set('mail.from.address', '');
            Config::set('mail.from.name', '');
        }
    }
}
