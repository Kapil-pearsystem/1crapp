<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Config;
use App\Models\SmtpSetting;
use Illuminate\Support\Facades\DB;

class ApplyAgentMailSettings
{
    public function handle($request, Closure $next)
    {
        $agent = app('currentAgent');

        if ($agent) {
            $mailConfig = SmtpSetting::where('user_id', $agent->id)->first();
            if ($mailConfig) {
                Config::set('mail.mailers.smtp.host', $mailConfig->host);
                Config::set('mail.mailers.smtp.port', $mailConfig->port);
                Config::set('mail.mailers.smtp.username', $mailConfig->username);
                Config::set('mail.mailers.smtp.password', $mailConfig->password);
                Config::set('mail.mailers.smtp.encryption', $mailConfig->enc_type);
                Config::set('mail.from.address', $mailConfig->from_address);
                Config::set('mail.from.name', $mailConfig->from_name);
            }else{
                Config::set('mail.mailers.smtp.host', env('MAIL_HOST'));
                Config::set('mail.mailers.smtp.port', env('MAIL_PORT'));
                Config::set('mail.mailers.smtp.username', env('MAIL_USERNAME'));
                Config::set('mail.mailers.smtp.password', env('MAIL_PASSWORD'));
                Config::set('mail.mailers.smtp.encryption', env('MAIL_ENCRYPTION'));
                Config::set('mail.from.address', env('MAIL_FROM_ADDRESS'));
                Config::set('mail.from.name', env('MAIL_FROM_NAME'));
            }
            // apply payment gateway setting for agent 
            $payment_credentials = DB::table('payment_setting')->where('user_id', $agent->id)->first();
            if ($payment_credentials) {
                // Set Razorpay credentials dynamically
                Config::set('razorpay.key', $payment_credentials->api_key);
                Config::set('razorpay.secret', $payment_credentials->api_secret);
            } else {
                // Fallback to .env Razorpay credentials
                Config::set('razorpay.key', env('RAZORPAY_KEY'));
                Config::set('razorpay.secret', env('RAZORPAY_SECRET'));
            }
        }

        return $next($request);
    }
}
