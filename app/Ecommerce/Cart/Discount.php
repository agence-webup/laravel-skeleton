<?php

namespace App\Ecommerce\Cart;

use JsonSerializable;

class Discount implements JsonSerializable
{
    const VALUE_TYPE_AMOUNT = 1;
    const VALUE_TYPE_RATE = 2;

    protected $id;
    protected $name;
    protected $valueType;
    protected $value;

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
