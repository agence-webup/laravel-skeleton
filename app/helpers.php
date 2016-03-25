<?php

if (! function_exists('asset')) {
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
        $urlGenerator = app('url');

        if (is_null(config('app.assets_url'))) {
            return $urlGenerator->asset($path, $secure);
        }

        if ($urlGenerator->isValidUrl($path)) {
            return $path;
        }

        return config('app.assets_url').'/'.trim($path, '/');
    }
}
