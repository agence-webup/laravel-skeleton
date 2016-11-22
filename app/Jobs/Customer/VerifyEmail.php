<?php

namespace App\Jobs\Customer;

use App\Repositories\CustomerRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Validation\ValidationException;
use Validator;

class VerifyEmail implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $customerId;
    protected $email;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($customerId, $email)
    {
        $this->customerId = $customerId;
        $this->email = $email;
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

        if ($customer->unverifiedEmail != $this->email) {
            $validator = Validator::make([], []);
            throw new \Exception('Cette adresse email ne correspond pas à celle de votre compte.');
            // $validator->errors()->add('email', 'Cette adresse email ne correspond pas à celle de votre compte.');
            // throw new ValidationException($validator);
        }

        $customer->email = $customer->unverifiedEmail;
        $customer->unverifiedEmail = null;

        $customerRepo->save($customer);
    }
}
