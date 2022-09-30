<?php

namespace App\Http\Middleware;

use Closure;

class RoleOr
{

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roleIds)
    {
        if (in_array($request->user()->role_id, $roleIds)) {
            return $next($request);
        }
        return redirect()->back();
    }
}
