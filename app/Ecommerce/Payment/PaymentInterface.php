<?php

namespace App\Ecommerce\Payment;

use Illuminate\Http\Request;
use App\Ecommerce\Order\OrderInterface;
use App\Ecommerce\Payment\PaymentResult;

interface PaymentInterface
{
    public function getFrontData();

    /**
     * Must be called to validate the payment
     * @param  Request $request
     * @return PaymentResult
     */
    public function validatePayment(OrderInterface $order, array $requestData);
}
