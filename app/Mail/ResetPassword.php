<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;
    public $email;
    public $username;
    public $token;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($username, $token , $email)
    {
        $this->email = $email;
        $this->username = $username;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('ayoubelkhaddari@gmail.com')->view('mails.passwordReset')->with([
            'username'=> $this->username,
            'token'=> $this->token,
            'email' =>$this->email,
        ]);
    }
}
