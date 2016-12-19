<?php

namespace App\Repositories;

use App\Entities\Coupon;

class CouponRepository
{
    public function getWithCode($code)
    {
        return Coupon::where('code', $code)->first();
    }
}
