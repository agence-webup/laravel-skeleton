<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function getSlugAttribute()
    {
        return $this->id;
    }

    public function tags()
    {
        return $this->hasManyThrough(Tag::class, ProductTag::class);
    }
}
