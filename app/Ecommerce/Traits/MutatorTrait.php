<?php

namespace App\Ecommerce\Traits;

/**
 * Trait to use getters and setters like properties
 */
trait MutatorTrait
{
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
