<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmailTest extends Mailable
{
    use Queueable, SerializesModels;
    protected $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->details = $details;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mailData = $this->details;
        $email = new SendEmailTest();
        Mail::send('admin.emails.emailTemplate', $mailData, function($message) use($mailData){
            $message->to($mailData['email'])
                ->subject($mailData['subject']);
        });
        return $this->view('admin.emails.emailTemplate');
    }
}
