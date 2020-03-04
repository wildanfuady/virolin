<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ThankEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($fullname, $title, $email, $thank)
    {
        $this->fullname = $fullname;
        $this->title = $title;
        $this->email = $email;
        $this->thank = $thank;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('tim@virolin.com', 'Tim Virolin')
        ->subject($this->title)
        ->view('email.thanks')
            ->with(
            [
                'fullname' => $this->fullname,
                'email' => $this->email,
                'thank' => $this->thank,
            ]);
    }
}
