<?php

namespace App\Repositories;

use App\Entities\Product;

class ProductRepository
{
    public function allWithTags($tags)
    {
        return Product::leftJoin('product_tags', 'products.id', '=', 'product_tags.product_id')
            ->whereIn('tag_id', $tags)
            ->get();
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
