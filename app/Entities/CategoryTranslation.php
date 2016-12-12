<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'title',
        'description',
        'metaTitle',
        'metaDescription',
        'metaKeywords',
    ];

    public function getSlugAttribute()
    {
        return $this->id.'-'.$this->title;
    }
}
