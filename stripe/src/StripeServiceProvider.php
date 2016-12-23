<?php

namespace Webup\Ecommerce\PaymentProvider\Stripe;

use Illuminate\Support\ServiceProvider;

class StripeServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     */
    public function boot()
    {
        $this->publishes([$this->getConfigSource() => config_path('ecommerce_stripe.php')]);

        $this->app['ecommerce.payment.manager']->extend('stripe', function ($app) {
            return $app['ecommerce.payment.stripe'];
        });
    }

    /**
     * Register any package services.
     */
    public function register()
    {
        $this->mergeConfigFrom($this->getConfigSource(), 'ecommerce_stripe');

        $this->app->singleton('ecommerce.payment.stripe', function ($app) {
            return new StripePayment($app['config']->get('ecommerce_stripe'));
        });
    }

    private function getConfigSource()
    {
        return realpath(__DIR__.'/../config/ecommerce_stripe.php');
    }
}
