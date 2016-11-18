<?php

namespace App\Entities;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'address',
        'postcode',
        'city',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
}
