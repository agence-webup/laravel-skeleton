<?php

namespace App\Providers;

use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Request;
use Closure;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

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

        $this->updateCannonical();
    }

    private function getCanonicalConfig()
    {
        return [
            "page" => function ($value) {
                return $value != 1;
            },
        ];
    }


    private function updateCannonical()
    {
        //get current url without query params
        $url = rtrim(strtok(url()->full(), '?'), "/");
        $trimmedAppUrl = rtrim(config('app.url'), "/");
        //Replace request root by app.url from config (ex : replace ip by domain)
        $url = str_replace(Request::root(), $trimmedAppUrl, $url);


        // Replace http by https if app.https config is true
        if (config("app.https")) {
            $url = str_replace("http://", "https://", $url);
        }
        // Add trailing on domain request
        if ($url == $trimmedAppUrl) {
            $url = $url . "/";
        }

        // Concat with authorized query params if needed
        if (count($getParams = $this->getAuthorizedQueryParams()) > 0) {
            $url .= "?" . http_build_query($getParams);
        }
        // Set canonical
        SEOMeta::setCanonical($url);
    }


    private function getAuthorizedQueryParams()
    {
        $getParams = [];
        $config = $this->getCanonicalConfig();
        // Extract only authorized getParams keys from request matching with 'getCanonicalConfig'
        $autorizedParams = url()->getRequest()->only(array_map(function ($key) use ($config) {
            return $config[$key] instanceof Closure ? $key : $config[$key];
        }, array_keys($config)));
        // Extract authorized params with value check
        foreach ($autorizedParams as $autorizedParam => $value) {
            if (isset($config[$autorizedParam]) && $config[$autorizedParam] instanceof Closure) {
                if ($config[$autorizedParam]($value)) {
                    $getParams[$autorizedParam] = $value;
                }
            } else {
                $getParams[$autorizedParam] = $value;
            }
        }
        return $getParams;
    }
}
