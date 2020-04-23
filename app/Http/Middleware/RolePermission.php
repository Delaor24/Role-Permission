<?php

namespace App\Http\Middleware;

use Closure;
class RolePermission
{
    use \App\Traits\UserPermission;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->checkPermission();
        return $next($request);
    }
}
