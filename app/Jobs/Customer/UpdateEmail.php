<?php

namespace App\Jobs\Customer;

use App\Mail\EmailVerification;
use App\Repositories\CustomerRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Mail\Mailer;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Validation\ValidationException;
use Validator;

class UpdateEmail implements ShouldQueue
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
    public function handle(CustomerRepository $customerRepo, Mailer $mailer)
    {
        $customer = $customerRepo->get($this->customerId);
        if (!$customer) {
            throw new ModelNotFoundException();
        }

        $this->validate($this->email);

        if ($customer->email == $this->email) {
            return;
        }

        $customer->email = $this->email;
        $customer->emailVerified = false;
        $customerRepo->save($customer);

        $mailer->to($customer)->send(new EmailVerification($customer));
    }

    protected function validate($email)
    {
        $validator = Validator::make([
            'email' => $email
        ], [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }
}
