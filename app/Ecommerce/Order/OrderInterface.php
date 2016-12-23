<?php

namespace App\Ecommerce\Order;

interface OrderInterface
{
    public function getAmountForPayment(): int;
    public function getDescription(): string;
}
