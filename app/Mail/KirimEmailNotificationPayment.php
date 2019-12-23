<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class KirimEmailNotificationPayment extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $status)
    {
        $this->name = $name;
        $this->status = $status;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->status == "Pending"){
            return $this->from('tim@virolin.com')
                ->view('email_pending')
                ->with(
                [
                    'name' => $this->name,
                    'status' => $this->status,
                ]);
        } else if($this->status == "Success"){
            return $this->from('tim@virolin.com')
                ->view('email_success')
                ->with(
                [
                    'name' => $this->name,
                    'status' => $this->status,
                ]);
        } else {}
    }
}
