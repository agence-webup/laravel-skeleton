<?php

namespace App\Repositories;

use App\Entities\Order;

class OrderRepository
{
    public function get($id)
    {
        return Order::find($id);
    }

    public function save(Order $order)
    {
        $order->save();
    }
}
