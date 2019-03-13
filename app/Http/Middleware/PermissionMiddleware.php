<?php

namespace App\Http\Middleware;

use Closure;

class PermissionMiddleware
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
        if (auth()->user()->group === 2 | auth()->user()->group === 3) {
            return $next($request);
        } else {
            return redirect('home');
        }
        //dd(auth()->user()->group);
    }
}
