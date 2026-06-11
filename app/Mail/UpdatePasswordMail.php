<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class UpdatePasswordMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    public $content;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $data)
    {
        $this->data = $data;
        $this->content = DB::table('tbl_authtemp')->where(['agent_id' => app('currentAgent')->id, 'category' => 2])->first();
        $this->subject = $this->content->subject ?? '1CR APP - Password Updated Successfully!';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('front.Mail.update-password-mail')->with([
                        'data' => $this->data,
                        'content' => $this->content
                    ])->subject($this->subject);
    }
}
