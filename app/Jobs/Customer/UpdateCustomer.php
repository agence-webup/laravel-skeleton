<?php

namespace App\Jobs\Customer;

use App\Repositories\CustomerRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateCustomer implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $customerId;
    protected $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($customerId, array $data)
    {
        $this->customerId = $customerId;
        $this->data = $data;
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

        $customer->fill($this->data);
        $customerRepo->save($customer);
    }
}
