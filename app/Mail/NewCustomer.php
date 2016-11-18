<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewCustomer extends Mailable
{
    use Queueable, SerializesModels;

    protected $customer;
    protected $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($customer, $password)
    {
        $this->customer = $customer;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.new-customer')->with([
            'customer' => $this->customer,
            'password' => $this->password,
        ]);
    }
}
