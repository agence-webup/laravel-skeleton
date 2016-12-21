<?php

namespace App\Ecommerce\Cart;

use App\Ecommerce\Traits\MutatorTrait;
use App\Ecommerce\Values\Price;
use JsonSerializable;

class Discount implements JsonSerializable
{
    use MutatorTrait;

    const VALUE_TYPE_AMOUNT = 1;
    const VALUE_TYPE_RATE = 2;

    protected $id;
    protected $name;
    protected $valueType;
    protected $value;
    protected $amount;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getValueType()
    {
        return $this->valueType;
    }

    public function setValueType($valueType)
    {
        $this->valueType = $valueType;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function apply($price)
    {
        if ($this->valueType == Discount::VALUE_TYPE_AMOUNT) {
            $rate = 1 - ($price->taxedPrice - $this->value) / $price->taxedPrice;
            $this->amount = $price->copy()->multiply($rate);
        } elseif ($this->valueType == Discount::VALUE_TYPE_RATE) {
            $this->amount = $price->copy()->multiply($this->value);
        }

        return $this->amount;
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
            'valueType' => $this->valueType,
            'value' => $this->value,
            'amount' => $this->amount,
        ];
    }
}
