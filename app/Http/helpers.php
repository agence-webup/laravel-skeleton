<?php

if (!function_exists('asset')) {
    /**
     * Generate a URL to an application asset.
     * Override the Laravel's asset function to use the config app.assets_url
     *
     * @param  string  $path
     * @param  bool|null  $secure
     * @return string
     */
    function asset($path, $secure = null)
    {
        try {
            return app('cachebuster.url')->url($path);
        } catch (Exception $e) {
            return config('cachebuster.cdn') . $path;
        }
    }
}

if (!function_exists('current_class')) {
    /**
     * Handle CSS class for current route
     * @param string  $routeName  Current route name for the page
     * @param string  $cssClass  CSS class for current state (default is current)
     *
     * @return string  Current class if match, else empty string
     */
    function current_class($routeName, $cssClass = 'current')
    {
        $currentRoute = app('router')->current()->getName();
        $rootPath = substr($currentRoute, 0, strlen($routeName));

        return ($rootPath == $routeName) ? $cssClass : '';
    }
}
