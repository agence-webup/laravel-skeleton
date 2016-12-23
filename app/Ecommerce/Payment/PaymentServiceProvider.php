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

        $this->app['ecommerce.payment.manager'] = $this->app->share(function ($app) {
            $manager = new PaymentManager($app);
            return $manager;
        });

        $this->app['ecommerce.payment'] = $this->app->share(function ($app) {
            return $app['ecommerce.payment.manager']->driver();
        });
    }
}
