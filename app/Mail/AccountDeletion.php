<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class AccountDeletion extends Mailable
{
    use Queueable, SerializesModels;


    public $yourName;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->yourName = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.account_deletion')
            ->subject('Account marked for Deletion')
            ->with([

                'yourName' => $this->yourName

            ]);
    }

}