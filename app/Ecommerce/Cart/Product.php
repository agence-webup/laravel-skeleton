<?php

namespace App\Ecommerce\Cart;

use App\Ecommerce\Traits\MutatorTrait;
use App\Ecommerce\Values\Price;
use JsonSerializable;

/**
 * Product
 * @property-read mixed $id
 * @property float $name
 * @property string $reference
 * @property \App\Ecommerce\Values\Price $price unit price
 * @property float $quantity
 * @property \App\Ecommerce\Values\Price $total
 * @property-read float $totalWeight
 * @property float $weight
 * @property float $link
 * @property float $image
 */
class Product implements JsonSerializable
{
    use MutatorTrait;

    protected $id;
    protected $name;
    protected $reference;
    protected $price;
    protected $quantity = 0;
    protected $weight;
    protected $link;
    protected $image;

    public function __construct($id)
    {
        $this->id = $id;
        $this->price = new Price();
        $this->total = new Price();
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

    public function getReference()
    {
        return $this->reference;
    }

    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice(Price $price)
    {
        $this->price = $price;
    }

    public function getTotal()
    {
        $total = clone $this->price;

        return $total->multiply($this->quantity);
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity(float $quantity)
    {
        $this->quantity = $quantity;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function setWeight(float $weight)
    {
        $this->weight = $weight;
    }

    public function getTotalWeight()
    {
        return $this->weight * $this->quantity;
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
            'quantity' => $this->quantity,
            'total' => $this->total,
            'weight' => $this->weight,
            'totalWeight' => $this->totalWeight,
            'link' => $this->link,
            'image' => $this->image,
        ];
    }
}
