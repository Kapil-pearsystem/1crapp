<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class VerificationCodeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $content;

    public function __construct(array $data)
    {
        $this->data = $data;
        $this->content = DB::table('tbl_authtemp')->where(['agent_id' => app('currentAgent')->id, 'category' => 2])->first();
        $this->subject = $this->content->subject ?? '1CR APP - ' . ($data['source'] ?? '') . ' Verification Code';
    }

    public function build()
    {
        return $this->subject($this->subject)->view('front.Mail.verification-code')
                    ->with([
                        'data' => $this->data,
                        'content' => $this->content
                    ]);
    }
}