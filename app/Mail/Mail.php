<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Mail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address='thetthirisan1@gmail.com';
        $name='thet';
        $subject='test';
        return $this->view('email.email')
                    ->from($address,$name)
                    ->cc($address,$name)
                    ->bcc($address,$name)
                    ->replyTo($address,$name)
                    ->subject($subject);
                    //->with($key,$value);
    }
}
