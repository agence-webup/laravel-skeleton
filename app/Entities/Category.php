<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use \Dimsav\Translatable\Translatable;

class Category extends Model
{
    use Translatable;

    protected $fillable = ['category_id', 'published', 'position','level'];

    public $translatedAttributes = [
        'title',
        'description',
        'metaTitle',
        'metaDescription',
        'metaKeywords',
        'slug',
    ];


    // public function parent()
    // {
    //     return $this->hasOne('App\Entities\Category', 'category_id', 'id');
    // }

    public function subCategories()
    {
        return $this->hasMany('App\Entities\Category', 'category_id', 'id');
    }
}
