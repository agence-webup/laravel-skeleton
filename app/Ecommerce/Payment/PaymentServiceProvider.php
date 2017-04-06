<?php

namespace App\Ecommerce\Payment;

use Illuminate\Support\ServiceProvider;
use App\Ecommerce\Payment\PaymentManager;

class PaymentServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     */
    public function boot()
    {
        //
    }

    /**
     * Register any package services.
     */
    public function register()
    {
        $this->app->alias('ecommerce.payment', 'App\Ecommerce\Payment\PaymentInterface');

        $this->app->singleton('ecommerce.payment.manager', function ($app) {
            $manager = new PaymentManager($app);
            return $manager;
        });

        $this->app->singleton('ecommerce.payment', function ($app) {
            return $app['ecommerce.payment.manager']->driver();
        });
    }
}
