<?php

namespace App\Mail;

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class Thanks extends Mailable
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
        return $this->view('emails.thankyouemail')
            ->subject('Welcome to Immersive!')
                    ->with([

                        'yourName' => $this->yourName

                    ]);
    }
}
