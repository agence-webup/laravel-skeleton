<?php

if (!function_exists('asset')) {
    /**
     * Override the Laravel's asset function
     * Generate a URL to an application asset,
     * and suffix the file with its checksum for cache busting.
     *
     * @param  string  $path
     * @param  bool|null  $secure
     * @return string
     */
    function asset($file, $buildDirectory = '')
    {
        static $manifest = [];
        static $manifestPath;
        if (empty($manifest) || $manifestPath !== $buildDirectory) {
            $path = public_path($buildDirectory . '/rev-manifest.json');
            if (file_exists($path)) {
                $manifest = json_decode(file_get_contents($path), true);
                $manifestPath = $buildDirectory;
            }
        }

        static $manifestWebpack = [];
        static $manifestWebpackPath;
        if (empty($manifestWebpack) || $manifestWebpackPath !== $buildDirectory) {
            $path = public_path($buildDirectory . '/mix-manifest.json');
            if (file_exists($path)) {
                $manifestWebpack = json_decode(file_get_contents($path), true);
                $manifestWebpackPath = $buildDirectory;
            }
        }


        $trimmedFile = ltrim($file, '/');
        if (isset($manifestWebpack[$file])) {
            return env('ASSETS_URL') . '/' . trim(mix($file), "/");
        } elseif (isset($manifest[$trimmedFile])) {
            $publicPath = env('ASSETS_URL') . '/' . trim($buildDirectory . '/' . $manifest[$trimmedFile], '/');
            return $publicPath;
        }

        // remove query string
        $unversioned = public_path(parse_url($file, PHP_URL_PATH));

        if (file_exists($unversioned)) {
            $publicPath = env('ASSETS_URL') . '/' . trim($file, '/');
            return $publicPath;
        }

        throw new InvalidArgumentException("File {$file} not defined in asset manifest.");
    }
}


if (!function_exists('current_class')) {
    /**
     * Handle CSS class for current route
     *
     * @param string  $routeName  Current route name for the page
     * @param string  $cssClass  CSS class for current state (default is current)
     * @return string  Current class if match, else empty string
     */
    function current_class($routeName, $cssClass = 'current')
    {
        $currentRoute = app('router')->current()->getName();
        $rootPath = substr($currentRoute, 0, strlen($routeName));

        return ($rootPath == $routeName) ? $cssClass : '';
    }
}
