<?php
  
namespace App\Jobs;
  
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\SendEmailTest;
use Mail;
  
class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $details;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
        $this->handle();
    }
  
    /**
     * Execute the job.
     *
     * @return void
     */ 
    public function handle()
    {
        $mailData = $this->details;
        // $email = new SendEmailTest();
        Mail::send('admin.emails.emailTemplate', $mailData, function($message) use($mailData){
            $message->to($mailData['email'])
                ->subject($mailData['subject']);
        });
    }
}
