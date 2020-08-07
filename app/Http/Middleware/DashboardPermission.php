<?php

namespace App\Http\Middleware;

use Closure;

class DashboardPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$permission)
    {
        if (hasThisPermission($permission)){
            return $next($request);
        }else{
            toast(__('dashboard.not_authorized_msg'),'error')->position(alertDirection());
            return redirect()->route('dashboard.index');
        }

    }
}
