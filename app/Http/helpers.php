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
        $isNodemodule = strpos($file, 'node_modules') !== false;

        if ($isNodemodule) {
            //get package name from path (ex "library" from "/node_modules/librabry/dist/library.css")
            $matches = [];
            preg_match("/\/node_modules\/(.+)\//mU", $file, $matches);
            $packageName = $matches[1] ?? null;

            $nodeModuleVersionsPath = storage_path("framework/node_module_versions.php");
            if (!file_exists($nodeModuleVersionsPath)) {
                throw new InvalidArgumentException('File "' . $nodeModuleVersionsPath . '" doesn\'t exist. Did you run "php artisan nodemodules:versions" ?');
            }
            $nodeModuleVersions = unserialize(file_get_contents($nodeModuleVersionsPath));

            try {
                $packageVersion = $nodeModuleVersions[$packageName];
            } catch (\Throwable $th) {
                throw new InvalidArgumentException("Cannot find version for package " . $packageName);
            }
            $publicPath = env('ASSETS_URL') . '/' . trim($file, '/');

            return $publicPath . "?v=" . $packageVersion;
        } elseif (empty($manifest) || $manifestPath !== $buildDirectory) {
            $path = public_path($buildDirectory . '/rev-manifest.json');
            if (file_exists($path)) {
                $manifest = json_decode(file_get_contents($path), true);
                $manifestPath = $buildDirectory;
            }
        }
        $file = ltrim($file, '/');
        if (isset($manifest[$file])) {
            $publicPath = config('app.asset_url') . '/' . trim($buildDirectory . '/' . $manifest[$file], '/');
            return $publicPath;
        }

        // remove query string
        $unversioned = public_path(parse_url($file, PHP_URL_PATH));

        if (file_exists($unversioned)) {
            $publicPath = config('app.asset_url') . '/' . trim($file, '/');
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
