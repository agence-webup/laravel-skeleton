<?php

namespace App\Ecommerce\Payment;

use Illuminate\Support\Manager;
use Webup\Ecommerce\PaymentProvider\Stripe\StripePayment;

class PaymentManager extends Manager
{
    /**
     * Get the default payment driver name.
     *
     * @return string
     */
    public function getDefaultDriver()
    {
        return $this->app['config']['payment.driver'];
    }
    /**
     * Set the default payment driver name.
     *
     * @param  string  $name
     * @return void
     */
    public function setDefaultDriver($name)
    {
        $this->app['config']['payment.driver'] = $name;
    }
}
