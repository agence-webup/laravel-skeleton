<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\JWTAuth;

class JWTAuthenticate
{
    /**
     * @var \Tymon\JWTAuth\JWTAuth
     */
    protected $auth;

    /**
     * Create a new BaseMiddleware instance.
     *
     * @param \Tymon\JWTAuth\JWTAuth  $auth
     */
    public function __construct(JWTAuth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->get('token')) {
            try {
                $this->auth->setToken($request->get('token'));
            } catch (\Exception $e) {
                return redirect()->guest(route('customer.login'));
            }

            $user = $this->auth->authenticate($token);

            if (! $user) {
                return redirect()->guest(route('customer.login'));
            }

            Auth::login($user);
        }

        return $next($request);
    }
}
