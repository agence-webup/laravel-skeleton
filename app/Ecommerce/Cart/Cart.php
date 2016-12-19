<?php

namespace App\Ecommerce\Cart;

use App\Ecommerce\Cart\Discount;
use App\Ecommerce\Cart\Product;
use JsonSerializable;

/**
 * Cart
 * @property-read float $price
 * @property-read float $tax
 * @property-read float $taxedPrice
 */
class Cart implements JsonSerializable
{
    /**
     * Products
     * @var array
     */
    protected $products = [];

    /**
     * Discounts
     * @var array
     */
    protected $discounts = [];

    /**
     * Total price excluding tax
     * @var float
     */
    protected $price = 0;

    /**
     * Total tax amount
     * @var float
     */
    protected $tax = 0;

    /**
     * Total price including tax
     * @var float
     */
    protected $taxedPrice = 0;

    /**
     * Add a product
     * @param App\Ecommerce\Cart\Product $product
     */
    public function addProduct(Product $product)
    {
        $this->products[$product->id] = $product;
        $this->update();
    }

    /**
     * Update the product with a given ID
     * @param  mixed $id
     * @param  int $quantity
     */
    public function updateProduct($id, $quantity)
    {
        if (array_key_exists($id, $this->products)) {
            $this->products[$id]->setQuantity($quantity);
            $this->update();
        }
    }

    /**
     * Remove the product with a given ID
     * @param  mixed $id
     */
    public function removeProduct($id)
    {
        if (array_key_exists($id, $this->products)) {
            unset($this->products[$id]);
            $this->update();
        }
    }

    /**
     * Add a discount
     * @param App\Ecommerce\Cart\Discount $discount
     */
    public function addDiscount(Discount $discount)
    {
        $this->discounts[$discount->id] = $discount;
        $this->update();
    }

    /**
     * Remove a discount
     * @param mixed $id
     */
    public function removeDiscount($id)
    {
        if (array_key_exists($id, $this->discounts)) {
            unset($this->discounts[$id]);
            $this->update();
        }
    }

     /**
      * Get the total price excluding tax
      * @return float
      */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Get the total tax amount
     * @var float
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * Get the total price including tax
     * @var float
     */
    public function getTaxedPrice()
    {
        return $this->taxedPrice;
    }

    /**
     * Update the cart price values
     */
    protected function update()
    {
        $price = 0;
        $tax = 0;
        $taxedPrice = 0;

        foreach ($this->products as $product) {
            $price += $product->totalPrice;
            $tax += $product->totalTax;
        }

        $taxedPrice = $price + $tax;

        $discountedPrice = 0;
        $discountedTax = 0;

        foreach ($this->discounts as $discount) {
            if ($discount->valueType == Discount::VALUE_TYPE_AMOUNT) {
                $rate = 1 - ($taxedPrice - $discount->value) / $taxedPrice;
                $discountedPrice += $price * $rate;
                $discountedTax += $tax * $rate;
            } elseif ($discount->valueType == Discount::VALUE_TYPE_RATE) {
                $discountedPrice += $price * $discount->value;
                $discountedTax += $tax * $discount->value;
            }
        }

        $this->price = $price - $discountedPrice;
        $this->tax = $tax - $discountedTax;
        $this->taxedPrice = $this->price + $this->tax;
    }

    /**
     * Convert the object into something JSON serializable.
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'products' => $this->products,
            'discounts' => $this->discounts,
            'price' => $this->price,
            'taxedPrice' => $this->taxedPrice,
            'tax' => $this->tax,
        ];
    }

    /**
     * Use the setter like a property
     * @param string $key
     * @param mixed $value
     */
    public function __set($key, $value)
    {
        $method = 'set'.ucfirst($key);
        if (method_exists($this, $method)) {
            $this->{$method}($value);
        }
    }

    /**
     * Use the getter like a property
     * @param  string $key
     * @return mixed
     */
    public function __get($key)
    {
        $method = 'get'.ucfirst($key);
        if (method_exists($this, $method)) {
            return $this->{$method}();
        }
    }
}
