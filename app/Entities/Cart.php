<?php

namespace App\Entities;

use Illuminate\Support\Collection;
use JsonSerializable;

class Cart implements JsonSerializable
{
    /**
     * Items
     * @var Illuminate\Support\Collection
     */
    protected $items;

    public function __construct()
    {
        $this->items = new Collection();
    }

    public function add(CartItem $item)
    {
        if ($this->items->has($item->id())) {
            $quantity = $item->quantity() + $this->items->get($item->id())->quantity();
            $item->setQuantity($quantity);
        }

        $this->items->put($item->id(), $item);
    }

    public function update($id, int $quantity)
    {
        $item = $this->items->get($id);
        if ($item) {
            $item->setQuantity($quantity);
        }
    }

    public function remove($id)
    {
        $this->items->pull($id);
    }

    /**
     * Get total price without tax
     * @return float
     */
    public function price()
    {
        return 0;
    }

    /**
     * Get total price including taxes
     * @return float
     */
    public function taxedPrice()
    {
        return 0;
    }

    /**
     * Get the total tax amount
     * @return float
     */
    public function tax()
    {
        return 0;
    }

    /**
     * Get the weight
     * @return float
     */
    public function weight()
    {
        return 0;
    }

    /**
     * Convert the object into something JSON serializable.
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'items' => $this->items,
            'price' => $this->price(),
            'taxedPrice' => $this->taxedPrice(),
            'tax' => $this->tax(),
            'weight' => $this->weight(),
        ];
    }
}
