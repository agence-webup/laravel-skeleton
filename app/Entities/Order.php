<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Ecommerce\Order\OrderInterface;

class Order extends Model implements OrderInterface
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
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'transactionsHistory' => 'array',
    ];

    public function products()
    {
        return $this->hasMany('App\Entities\OrderProduct', 'order_id', 'id');
    }

    public function getAmountForPayment(): int
    {
        return intval($this->taxedPrice * 100);
    }

    public function getDescription(): string
    {
        return "Order #" . $this->id;
    }
}
