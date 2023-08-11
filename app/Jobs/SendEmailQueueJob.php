<?php

namespace App\Jobs;

use App\Mail\UserRegisterEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailQueueJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $sendEmail, $user;

    /**
     * Create a new job instance.
     */
    public function __construct($sendEmail, $user)
    {
        $this->sendEmail = $sendEmail;
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $email = new UserRegisterEmail($this->user);
        Mail::to($this->sendEmail)->send($email);
    }
}
