<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\SmtpSetting;

class AdminGiftMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $mailConfig;

    public function __construct(array $data)
    {
        $this->data = $data;
        $this->subject = $data['subject'];
        $this->mailConfig = SmtpSetting::where('user_id', $data['agent_id'])->first();
    }

    public function build()
    {
        $mail = $this->view('mail-temp.admin-gift-mail')
                    ->with('data', $this->data)
                    ->subject($this->subject);

        if ($this->mailConfig) {
            $mail->from(
                $this->mailConfig->mail_from_address,
                $this->mailConfig->mail_from_name
            );
        }

        return $mail;
    }
}