<?php

namespace App\Ecommerce\Values;

use App\Ecommerce\Traits\MutatorTrait;
use JsonSerializable;

/**
 * Price
 * @property-read float $price Price excluding tax
 * @property-read float $tax Tax amount
 * @property-read float $taxedPrice Price including tax
 */
class Price implements JsonSerializable
{
    use MutatorTrait;

    protected $price = 0;
    protected $tax = 0;

    public function __construct($price = 0, $tax = 0)
    {
        $this->price = $price;
        $this->tax = $tax;
    }

    public static function createWithRate($price, $rate)
    {
        return new static($price, $price * $rate);
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getTax()
    {
        return $this->tax;
    }

    public function getTaxedPrice()
    {
        return $this->price + $this->tax;
    }

    public function add(Price $price)
    {
        $this->price += $price->price;
        $this->tax += $price->tax;

        return $this;
    }

    public function multiply($quantity)
    {
        $this->price *= $quantity;
        $this->tax *= $quantity;

        return $this;
    }

    public function copy()
    {
        return clone $this;
    }

    /**
     * Convert the object into something JSON serializable.
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'price' => $this->price,
            'tax' => $this->tax,
            'taxedPrice' => $this->taxedPrice,
        ];
    }
}
