<?php

if (! function_exists('asset_url')) {
    /**
     * Generate an asset path for the application.
     *
     * @param  string  $path
     * @return string
     */
    function asset_url($path)
    {
        return config('app.assets_url').'/'.trim($path, '/');
    }
}
