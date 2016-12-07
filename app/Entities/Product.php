<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Entities\ProductTag;
use \Dimsav\Translatable\Translatable;

class Product extends Model
{
    use Translatable;

    protected $fillable = ['reference', 'price'];

    public $translatedAttributes = ['title'];


    public function getSlugAttribute()
    {
        return $this->id;
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, (new ProductTag())->getTable(), 'product_id', 'tag_id');
    }
}
