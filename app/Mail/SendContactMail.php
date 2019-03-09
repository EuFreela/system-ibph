<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendContactMail extends Mailable
{
    use Queueable, SerializesModels;

   /**
     * Create a new message instance.
     *
     * @return void
     */
    public $name;
    public $email;
    public $msg;

    public function __construct($name,$email,$message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->msg = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM'))
        ->subject('Contato')
        ->view('mail.contact');
    }
}
