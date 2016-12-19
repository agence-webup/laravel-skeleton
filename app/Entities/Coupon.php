<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
        'code',
        'name',
        'valueType',
        'value',
        'customer_id',
        'usedDate',
        'expirationDate',
    ];
}
