<?php

namespace App\Jobs\Customer;

use App\Repositories\CustomerRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ResetPassword
{
    use Queueable;

    protected $customerId;
    protected $password;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($customerId, $password)
    {
        $this->customerId = $customerId;
        $this->password = $password;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(CustomerRepository $customerRepo)
    {
        $customer = $customerRepo->get($this->customerId);
        if (!$customer) {
            throw new ModelNotFoundException();
        }

        $customer->password = bcrypt($this->password);

        $customerRepo->save($customer);
    }
}
