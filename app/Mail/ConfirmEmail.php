<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConfirmEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($fullname, $email, $token, $teks, $slug)
    {
        $this->fullname = $fullname;
        $this->email = $email;
        $this->token = $token;
        $this->teks = $teks;
        $this->slug = $slug;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('tim@virolin.com', 'Tim Virolin')
            ->subject('Selangkah Lagi untuk Dapatkan Akses Free Ecourse dari Virolin')
            ->view('email.confirm')
            ->with(
            [
                'fullname' => $this->fullname,
                'email' => $this->email,
                'token' => $this->token,
                'teks' => $this->teks,
                'slug' => $this->slug,
            ]);
    }
}
