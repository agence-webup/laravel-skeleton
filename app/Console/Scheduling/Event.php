<?php

namespace App\Console\Scheduling;

use Illuminate\Console\Scheduling\Event as IlluminateEvent;

class Event extends IlluminateEvent
{
    /**
     * Set the cron key
     *
     * @param  string  $key
     * @return $this
     */
    public function setCronKey($key)
    {
        $config = config('cron');
        if (array_key_exists(app()->environment(), $config)) {
            $config = $config[app()->environment()];
            if (array_key_exists($key, $config)) {
                $url = $config[$key];

                $this->pingOnSuccess($url)
                    ->pingOnFailure($url . '/fail');
            }
        }

        return $this;
    }
}
