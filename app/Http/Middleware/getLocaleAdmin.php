<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class getLocaleAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $localeRepository = app(\Webup\LaravelHelium\Translation\LocaleRepository::class);
        $supportedLocales = $localeRepository->supportedLocales();
        $locale = $supportedLocales[0];

        if ($request->locale && $localeRepository->get($request->locale)) {
            $locale = $localeRepository->get($request->locale);
        }

        // if (!Auth::guard('admin')->check()) {
        app()->setLocale($locale->code);
        // }

        view()->share('locale', $locale);
        view()->share('supportedLocales', $supportedLocales);

        $request->currentLocale = $locale;
        $request->supportedLocales = $supportedLocales;

        return $next($request);
    }
}
