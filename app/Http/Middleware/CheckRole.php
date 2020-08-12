<?php

namespace App\Http\Middleware;
use Auth;
use App\User;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next, $role)
    {

        if (Auth::user()->rol->nombre) {
            return redirect('home');
        }
    return $next($request);
    }
}
