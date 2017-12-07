<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class mailConfirm extends Mailable
{
    use Queueable, SerializesModels;

    public $token;
    public $tokendate;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($token,$tokendate)
    {
        //
        $this->token = $token;
        $this->tokendate = $tokendate;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('huylevinh13@gmail.com','Huy PHP')->subject("Test Mail")->view('mail.mailconfirm');
    }
}
