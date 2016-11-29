<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Entities\Product;
use App\Entities\ProductTag;

class Tag extends Model
{
    public function products()
    {
        return $this->belongsToMany(Product::class, (new ProductTag())->getTable(), 'tag_id', 'product_id');
    }
}
