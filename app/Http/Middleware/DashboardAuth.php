<?php

namespace App\Http\Middleware;

use Closure;

class DashboardAuth
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
        if (auth('dashboard')->check()){
            return $next($request);
        } else{
             return redirect()->route('dashboard.loginForm');
        }

    }
}
