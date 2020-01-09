<?php

namespace App\Http\Middleware;

use Closure;

class warehouse
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->session()->get('role') == 'warehouse_managers') {
            return $next($request);
        }
        return redirect('/');
    }
}
