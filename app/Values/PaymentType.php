<?php

namespace App\Values;

class PaymentType
{
    const CREDIT_CARD = 1;

    public static function label($value)
    {
        $all = self::lists();

        return key_exists($value, $all) ? $all[$value] : '';
    }

    public static function lists()
    {
        return [
            self::CREDIT_CARD => "Carte bancaire",
        ];
    }
}
