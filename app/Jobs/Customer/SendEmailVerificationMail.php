<?php

namespace App\Jobs\Customer;

use App\Mail\EmailVerification;
use App\Repositories\CustomerRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailer;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendEmailVerificationMail implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $customerId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($customerId)
    {
        $this->customerId = $customerId;
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

        $mailer->to($customer)->send(new EmailVerification($customer));
    }
}
