<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailVerifyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $request;
    public function __construct($request)
    {
        $this->request = $request;
    }

    public function build()
    {
        $data['data'] =  $this->request;

        // dd($data);
        if ($this->request['mailBody']=='forgotpassword') {
            $subject = 'Your forgot password link.';
        }
        return $this->view('mail.mail', $data)
                    ->to($this->request['email'])
                    ->subject($subject)
                    ->from('info@gravity.com',env('APP_NAME'));
    }
}
