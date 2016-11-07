<?php

namespace App\Jobs\Customer;

use App\Entities\Customer;
use App\Mail\CustomerCreated;
use App\Repositories\CustomerRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailer;

class CreateCustomer
{
    use Queueable;

    protected $email;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        $this->email = $email;
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
        $customer->email = $this->email;
        $customer->password = bcrypt($password);

        $customerRepo->save($customer);

        $mailer->to($customer)->send(new CustomerCreated($customer, $password));

        return $customer;
    }
}
