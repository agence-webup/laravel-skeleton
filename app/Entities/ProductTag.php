<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductTag extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'tag_id',
    ];
}
