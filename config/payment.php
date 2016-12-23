<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Payment Driver
    |--------------------------------------------------------------------------
    |
    | Choose the payment driver to be used for online transactions (credit cards, etc)
    |
    | Supported: "stripe"
    |
    */

    'driver' => env('PAYMENT_DRIVER', 'stripe'),

];
