<?php

namespace App\Jobs\Payment;

use App\Entities\Order;
use App\Repositories\OrderRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Validation\ValidationException;
use Validator;
use DB;
use Log;
use App\Values\OrderStatus;
use App\Values\PaymentType;
use App\Ecommerce\Payment\PaymentResult;
use App\Ecommerce\Payment\PaymentInterface;

class ValidateCreditCardPayment implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Order
     * @var Order
     */
    private $order;

    /**
     * Request data
     * @var array
     */
    private $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Order $order, array $data)
    {
        $this->order = $order;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return PaymentResult
     */
    public function handle(OrderRepository $orderRepo, PaymentInterface $paymentProvider)
    {
        $this->order->paymentType = PaymentType::CREDIT_CARD;

        if ($this->order->transactionsHistory == null) {
            $this->order->transactionsHistory = [];
        }

        $result = null;

        try {
            $result = $paymentProvider->validatePayment($this->order, $this->data);

            $this->order->transactionsHistory = array_merge($this->order->transactionsHistory, [$result]);

            if ($result->success) {
                $this->order->status = OrderStatus::PAID;
            } else {
                $this->order->status = OrderStatus::REFUSED;
            }
        } catch (\Exception $e) {
            Log::error($e);
            $result = new PaymentResult();
            $result->success = false;
            $result->message = $e->getMessage();
            $result->timestamp = time();

            $this->order->transactionsHistory = array_merge($this->order->transactionsHistory, [$result]);
        }

        $orderRepo->save($this->order);

        return $result;
    }
}
