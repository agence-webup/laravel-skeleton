<?php

namespace App\Repositories;

use App\Entities\Product;

class ProductRepository
{
    public function allWithTags(array $tags)
    {
        return Product::whereHas('tags', function ($q) use ($tags) {
            $q->whereIn('tags.id', $tags);
        }, '=', count($tags))->get();
    }

    public function get($id)
    {
        return Product::find($id);
    }

    public function save(Product $customer)
    {
        $customer->save();
    }
}
