<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class NonAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->session()->get('isLoggedIn', false)) {
            return redirect('/user');
        }
        return $next($request);
    }
}
