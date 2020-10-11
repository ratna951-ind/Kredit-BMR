<?php

namespace App\Http\Middleware;

use Closure;

class PeranMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $roleId)
    {
        if(!$request->user()->punyaPeran($roleId))
        {
            return redirect()
                ->to('/');
        }
        return $next($request);
    }
}
