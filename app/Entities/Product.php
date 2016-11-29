<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Entities\Tag;
use App\Entities\ProductTag;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    public function getSlugAttribute()
    {
        return $this->id;
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, (new ProductTag())->getTable(), 'product_id', 'tag_id');
    }
}
