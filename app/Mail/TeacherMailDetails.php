<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TeacherMailDetails extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $request;
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data['data'] =  $this->request;
        //dd($this->request);
        $subject="Welcome to Gravity";
        return $this->view('mail.teacher_mail_details', $data)
                    ->to($this->request['email'])
                    ->subject($subject)
                    ->from(env('MAIL_USERNAME'),env('APP_NAME'));
    }
}
