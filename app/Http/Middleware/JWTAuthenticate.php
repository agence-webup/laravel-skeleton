<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Contracts\Auth\Factory as Auth;

class JWTAuthenticate
{
    /**
     * @var \Illuminate\Contracts\Auth\Factory
     */
    protected $auth;

    /**
     * @var \Tymon\JWTAuth\JWTAuth
     */
    protected $jwtAuth;

    /**
     * Create a new BaseMiddleware instance.
     *
     * @param \Tymon\JWTAuth\JWTAuth  $auth
     * @param \Illuminate\Contracts\Auth\Factory  $jwtAuth
     */
    public function __construct(Auth $auth, JWTAuth $jwtAuth)
    {
        $this->auth = $auth;
        $this->jwtAuth = $jwtAuth;
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
        $token = $request->get('token', null);
        if ($token) {
            try {
                $this->jwtAuth->setToken($token);
            } catch (\Exception $e) {
                return redirect()->guest(route('customer.login'));
            }

            $user = $this->jwtAuth->authenticate($token);

            if (! $user) {
                return redirect()->guest(route('customer.login'));
            }

            $this->auth->login($user);
        }

        return $next($request);
    }
}
