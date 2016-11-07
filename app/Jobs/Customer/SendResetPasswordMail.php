<?php

namespace App\Jobs\Customer;

use App\Entities\Customer;
use App\Mail\ResetPassword;
use App\Repositories\CustomerRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Mail\Mailer;

class SendResetPasswordMail
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
        $customer = $customerRepo->getByEmail($this->email);

        if (!$customer) {
            throw new ModelNotFoundException();
        }

        $mailer->to($customer)->send(new ResetPassword($customer));

        return $customer;
    }
}
