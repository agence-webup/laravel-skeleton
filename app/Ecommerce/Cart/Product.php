<?php

namespace App\Ecommerce\Cart;

use JsonSerializable;

class Product implements JsonSerializable
{
    protected $id;
    protected $name;
    protected $price = 0;
    protected $taxRate = 0;
    protected $quantity = 0;
    protected $weight;
    protected $link;
    protected $image;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getTaxRate()
    {
        return $this->taxRate;
    }

    public function setTaxRate($taxRate)
    {
        $this->taxRate = $taxRate;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function getTax()
    {
        return $this->price * $this->taxRate;
    }

    public function getTaxedPrice()
    {
        return $this->price + $this->tax;
    }

    public function getTotalPrice()
    {
        return $this->price * $this->quantity;
    }

    public function getTotalTax()
    {
        return $this->tax * $this->quantity;
    }

    public function getTotalTaxedPrice()
    {
        return $this->taxedPrice * $this->quantity;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    public function getLink()
    {
        return $this->link;
    }

    public function setLink($link)
    {
        $this->link = $link;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * Convert the object into something JSON serializable.
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'taxedPrice' => $this->taxedPrice,
            'tax' => $this->tax,
            'taxRate' => $this->taxRate,
            'quantity' => $this->quantity,
            'totalPrice' => $this->totalPrice,
            'totalTaxedPrice' => $this->totalTaxedPrice,
            'totalTax' => $this->totalTax,
            'weight' => $this->weight,
            'totalWeight' => $this->totalWeight,
            'link' => $this->link,
            'image' => $this->image,
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
