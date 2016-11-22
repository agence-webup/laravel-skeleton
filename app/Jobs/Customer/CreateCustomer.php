<?php

namespace App\Jobs\Customer;

use App\Entities\Customer;
use App\Mail\NewCustomer;
use App\Repositories\CustomerRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailer;

class CreateCustomer
{
    use Queueable;

    protected $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(CustomerRepository $customerRepo, Mailer $mailer)
    {
        $password = str_random(8);

        $customer = new Customer();
        $customer->email = $this->data['email'];
        $customer->password = bcrypt($password);
        $customer->firstname = $this->data['firstname'];
        $customer->lastname = $this->data['lastname'];
        $customer->address = $this->data['address'];
        $customer->postcode = $this->data['postcode'];
        $customer->city = $this->data['city'];
        $customer->unverifiedEmail = $this->data['email'];

        $customerRepo->save($customer);

        $mailer->to($customer)->send(new NewCustomer($customer, $password));

        return $customer;
    }
}
