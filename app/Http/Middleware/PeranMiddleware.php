<?php

namespace App\Http\Middleware;

use Closure;
use Alert;

class PeranMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ... $roles)
    {
        foreach($roles as $role) {
            if($request->user()->punyaPeran($role))
            {
                return $next($request);
            }
        }

        Alert::warning('Akses Dilarang', 'Anda tidak memiliki hak!');

        return redirect()->to('/');
    }
}
