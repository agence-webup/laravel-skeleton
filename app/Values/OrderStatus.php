<?php

namespace App\Values;

class OrderStatus
{
    const CREATED = 1;
    const PAID = 2;
    const SENT = 3;
    const DELIVERED = 4;
    const CANCELED = 5;
    const REFUSED = 6;

    public static function label($value)
    {
        $all = self::lists();

        return key_exists($value, $all) ? $all[$value] : '';
    }

    public static function lists()
    {
        return [
            self::CREATED => "En attente de paiement",
            self::PAID => "Payée",
            self::SENT => "Expédiée",
            self::DELIVERED => "Livrée",
            self::CANCELED => "Annulée",
            self::REFUSED => "Refusée",
        ];
    }
}
