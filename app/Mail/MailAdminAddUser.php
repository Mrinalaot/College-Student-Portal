<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class MailAdminAddUser extends Mailable
{
    use Queueable, SerializesModels;
    public $user,$pass;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$pass)
    {
        $this->user = $user;
        $this->pass = $pass;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("mrinalcs28@gmail.com")
                    ->subject('Congratulatins')
                    ->view('emails.admin_add_user');
    }
}
