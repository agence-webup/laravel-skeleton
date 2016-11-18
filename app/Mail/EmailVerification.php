<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use JWTAuth;

class EmailVerification extends Mailable
{
    use Queueable, SerializesModels;

    protected $customer;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($customer)
    {
        $this->customer = $customer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $queryString = http_build_query([
            'email' => $this->customer->email,
            'token' => JWTAuth::fromUser($this->customer),
        ]);

        return $this->view('emails.email-verification')->with([
            'customer' => $this->customer,
            'verifyUrl' => route('customer.email.verify') . '?' . $queryString,
        ]);
    }
}
