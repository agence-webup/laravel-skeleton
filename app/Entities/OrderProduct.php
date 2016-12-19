<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Ecommerce\Cart\Product;

class OrderProduct extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'reference',
        'name',
        'quantity',
        'price',
        'taxedPrice',
        'tax',
        'taxRate',
        'totalPrice',
        'totalTaxedPrice',
        'totalTax',
        'weight',
        'totalWeight',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Create an OrderProduct from a cart product
     * @param  Product      $product
     * @return OrderProduct
     */
    public static function createFromCartProduct(Product $product): OrderProduct
    {
        $orderProduct = new OrderProduct();
        $orderProduct->product_id = $product->id;
        $orderProduct->reference = $product->reference;
        $orderProduct->name = $product->name;
        $orderProduct->quantity = $product->quantity;
        $orderProduct->price = $product->price;
        $orderProduct->taxedPrice = $product->taxedPrice;
        $orderProduct->tax = $product->tax;
        $orderProduct->taxRate = $product->taxRate;
        $orderProduct->totalPrice = $product->totalPrice;
        $orderProduct->totalTaxedPrice = $product->totalTaxedPrice;
        $orderProduct->totalTax = $product->totalTax;
        $orderProduct->weight = $product->weight;
        $orderProduct->totalWeight = $product->totalWeight;

        return $orderProduct;
    }

    /**
     * Order belongsTo relationship
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo('App\Entities\Order');
    }
}
