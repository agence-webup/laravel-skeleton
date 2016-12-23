<?php

return [

    // Stripe API keys
    'secret_key' => env('STRIPE_SECRET'),
    'publishable_key' => env('STRIPE_KEY'),

    // the currency to be used for charging
    'currency' => 'eur',

    // URLs
    'urls' => [
        'checkout' => 'https://checkout.stripe.com/checkout.js'
    ],

];
