<?php

namespace App\Entities;

use JsonSerializable;

class CartItem implements JsonSerializable
{
    protected $id;
    protected $name;
    protected $price;
    protected $taxRate;
    protected $quantity;
    protected $weight;

    /**
     * [__construct description]
     * @param mixed $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Get id
     * @return mixed
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * Get the name of product
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * Set title
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * Get the unit price without tax
     * @return float
     */
    public function price()
    {
        return $this->price;
    }

    /**
     * Set the unit price without tax
     * @param float $title
     */
    public function setPrice(float $price)
    {
        $this->price = $price;
    }

    /**
     * Get the unit price with tax
     * @return float
     */
    public function taxedPrice()
    {
        return $this->price + $this->tax();
    }

    /**
     * Get the unit tax
     * @return float
     */
    public function tax()
    {
        return $this->price * $this->taxRate;
    }

    /**
     * Get the tax rate
     * @return float
     */
    public function taxRate()
    {
        return $this->taxRate;
    }

    /**
     * Set the tax rate
     * @return float
     */
    public function setTaxRate(float $taxRate)
    {
        $this->taxRate = $taxRate;
    }

    /**
     * Get the quantity
     * @return int
     */
    public function quantity()
    {
        return $this->quantity;
    }

    /**
     * Set the quantity
     * @return int
     */
    public function setQuantity(int $quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * Get the subtotal without tax
     * @return float
     */
    public function totalPrice()
    {
        return $this->price * $this->quantity;
    }

    /**
     * Get the subtotal with tax
     * @return float
     */
    public function totalTaxedPrice()
    {
        return $this->taxedPrice() * $this->quantity;
    }

    /**
     * Get the total tax
     * @return float
     */
    public function totalTax()
    {
        return $this->tax() * $this->quantity;
    }

    /**
     * Get the unit weight
     * @return float
     */
    public function weight()
    {
        return $this->weight;
    }

    /**
     * Set the unit weight
     * @return float
     */
    public function setWeight(float $weight)
    {
        $this->weight = $weight;
    }

    /**
     * Get the total weight
     * @return float
     */
    public function totalWeight()
    {
        return $this->weight * $this->quantity;
    }

    /**
     * Convert the object into something JSON serializable.
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id(),
            'name' => $this->name(),
            'price' => $this->price(),
            'taxedPrice' => $this->taxedPrice(),
            'tax' => $this->tax(),
            'taxRate' => $this->taxRate(),
            'quantity' => $this->quantity(),
            'totalPrice' => $this->totalPrice(),
            'totalTaxedPrice' => $this->totalTaxedPrice(),
            'totalTax' => $this->totalTax(),
            'weight' => $this->weight(),
            'totalWeight' => $this->totalWeight(),
        ];
    }
}
