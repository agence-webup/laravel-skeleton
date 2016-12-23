<?php

namespace App\Ecommerce\Payment;

use Illuminate\Contracts\Support\Arrayable;

class PaymentResult implements \JsonSerializable, Arrayable
{
    /**
     * Indicate if the payment is successful
     * @var bool
     */
    public $success;

    /**
     * Message associated to the payment
     * @var string
     */
    public $message;

    /**
     * Timestamp of the payment response
     * @var int
     */
    public $timestamp;

    /**
     * Response data after payment
     * @var array
     */
    public $rawResponse;

    public function jsonSerialize()
    {
        return $this->toArray();
    }

    public function toArray()
    {
        return [
            'success' => $this->success,
            'message' => $this->message,
            'timestamp' => $this->timestamp,
            'raw_response' => $this->rawResponse,
        ];
    }
}
