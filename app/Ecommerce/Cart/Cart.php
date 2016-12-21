<?php

namespace App\Ecommerce\Cart;

use App\Ecommerce\Cart\Discount;
use App\Ecommerce\Cart\Product;
use App\Ecommerce\Traits\MutatorTrait;
use App\Ecommerce\Values\Price;
use JsonSerializable;

/**
 * Cart
 * @property-read array $products
 * @property-read array $discounts
 * @property-read \App\Ecommerce\Values\Price $shippingCost
 * @property-read \App\Ecommerce\Values\Price $subtotal
 * @property-read \App\Ecommerce\Values\Price $total
 */
class Cart implements JsonSerializable
{
    use MutatorTrait;

    /**
     * Products
     * @var array of \App\Ecommerce\Cart\Product
     */
    protected $products = [];

    /**
     * Discounts
     * @var array of \App\Ecommerce\Cart\Discount
     */
    protected $discounts = [];

    /**
     * Shipping and packing costs
     * @var \App\Ecommerce\Values\Price
     */
    protected $shippingCost;

    /**
     * Total of products and discounts
     * @var \App\Ecommerce\Values\Price
     */
    protected $subtotal;

    /**
     * Total to paid with shipping cost
     * @var \App\Ecommerce\Values\Price
     */
    protected $total;

    /**
     * Create a new Cart.
     */
    public function __construct()
    {
        $this->shippingCost = new Price();
        $this->subtotal = new Price();
        $this->total = new Price();
    }

    /**
     * Add a product
     * @param \App\Ecommerce\Cart\Product $product
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
     * @param \App\Ecommerce\Cart\Discount $discount
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
     * Get the products
     * @return array of \App\Ecommerce\Cart\Product
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Get the discounts
     * @return array of \App\Ecommerce\Cart\Discount
     */
    public function getDiscounts()
    {
        return $this->discounts;
    }

    /**
     * Get the shipping cost
     * @var \App\Ecommerce\Values\Price
     */
    public function getShippingCost()
    {
        return $this->shippingCost;
    }

    /**
     * Get the total of products with discounts
     * @var \App\Ecommerce\Values\Price
     */
    public function getSubtotal()
    {
        return $this->subtotal;
    }

    /**
     * Get the total to paid
     * @var \App\Ecommerce\Values\Price
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Update the cart price values
     */
    protected function update()
    {
        $productSum = new Price();
        foreach ($this->products as $product) {
            $productSum->add($product->total);
        }

        $discountSum = new Price();
        foreach ($this->discounts as $discount) {
            $amount = $discount->apply($productSum);
            $discountSum->add($amount);
        }

        $price = $productSum->price - $discountSum->price;
        $tax = $productSum->tax - $discountSum->tax;
        $price = $price < 0 ? 0 : $price;
        $tax = $tax < 0 ? 0 : $tax;
        $this->subtotal = new Price($price, $tax);

        $total = clone $this->subtotal;
        $total->add($this->shippingCost);
        $this->total = $total;
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
            'shippingCost' => $this->shippingCost,
            'subtotal' => $this->subtotal,
            'total' => $this->total,
        ];
    }
}
