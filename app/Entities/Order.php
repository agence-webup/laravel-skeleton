<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_id',
        'billingFirstname',
        'billingLastname',
        'billingEmail',
        'billingPhone',
        'billingAddress',
        'billingAddress2',
        'billingPostalcode',
        'billingCity',
        'deliveryFirstname',
        'deliveryLastname',
        'deliveryEmail',
        'deliveryPhone',
        'deliveryAddress',
        'deliveryAddress2',
        'deliveryPostalcode',
        'deliveryCity',
        'status',
        'paymentType',
        'invoiceNumber',
        'followNumber',
        'shippingCost',
        'price',
        'taxedPrice',
        'tax',
        'paidDate',
        'refusedDate',
    ];

    public function products()
    {
        return $this->hasMany('App\Entities\OrderProduct', 'order_id', 'id');
    }
}
