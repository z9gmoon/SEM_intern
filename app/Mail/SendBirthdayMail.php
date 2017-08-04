<?php

namespace App\Mail;
use Carbon\Carbon;
use App\Engineer;
use App\Http\Controllers\HomeController;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendBirthdayMail extends Mailable
{
    use Queueable, SerializesModels;

    public $engineer;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct($engineer)
    {
        $this->engineer=$engineer;

    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->from("agent.enclave@gmail.com")->view('email.birthday')->subject('[Enclave] Happy Birthday!');


    }
}
