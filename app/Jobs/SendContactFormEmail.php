<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;
use App\Mail\ContactFormEmail;
use App\ContactForm;

class SendContactFormEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $contactForms = ContactForm::where('sentToQueue', false)->get();
        foreach($contactForms as $contactForm){
            Mail::to('admin@molveno.it')->send(new ContactFormEmail($contactForm)); 
            $contactForm->sentToQueue = true;
            $contactForm->save();
        }
    }
}
