<?php


if (!function_exists('asset')) {
    /**
     * Override the Laravel's asset function
     * Generate a URL to an application asset,
     * and suffix the file with its checksum for cache busting.
     */
    function asset($file, $buildDirectory = '')
    {
        $assetUrl = trim(config('app.asset_url'), '/');

        if (strpos($file, "vendor/telescope") !== false) {
            return $assetUrl . '/' . trim($file, '/');
        }

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

        static $manifestNpm = [];
        static $manifestNpmPath;
        if (empty($manifestNpm) || $manifestNpmPath !== $buildDirectory) {
            $path = public_path($buildDirectory . '/npm-manifest.json');
            if (file_exists($path)) {
                $manifestNpm = json_decode(file_get_contents($path), true);
                $manifestNpmPath = $buildDirectory;
            }
        }

        $trimmedFile = ltrim($file, '/');
        if (isset($manifestNpm[$file])) {
            return $assetUrl . '/' . trim($buildDirectory . '/' . $manifestNpm[$file], '/');
        } elseif (isset($manifestWebpack[$file])) {
            return $assetUrl . '/' . trim(mix($file), "/");
        } elseif (isset($manifest[$trimmedFile])) {
            return $assetUrl . '/' . trim($buildDirectory . '/' . $manifest[$trimmedFile], '/');
        }


        // remove query string
        $unversioned = public_path(parse_url($file, PHP_URL_PATH));

        if (file_exists($unversioned)) {
            $publicPath = $assetUrl . '/' . trim($file, '/');
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
