<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->make('config')->get('app.https')) {
            $this->app->url->forceScheme('https');
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        setlocale(LC_MONETARY, 'fr_FR.UTF-8');

        $this->app->singleton('cachebuster.url', function () {
            return new \Themonkeys\Cachebuster\AssetURLGenerator();
        });
    }
}
