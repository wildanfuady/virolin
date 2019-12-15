<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class IngatkanEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->name = $user->name;
        $this->product_name = $user->product->product_name;
        $this->expired = $user->masa_aktif;
        // $this->
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('sharewa@loginbisnis.com')
                    ->subject('Peringatan Expired')
                    ->view('email.ingatkanemail');
    }
}
