<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterUser extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $details;
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('welcome_email');

        $name = $this->details['name'];
        $mobile = $this->details['mobile'];
        $address = $this->details['address'];
        $gender = $this->details['gender'];

        return $this->view('email.sendEnailToUser', compact('name', 'mobile', 'address', 'gender'));
    }
}
