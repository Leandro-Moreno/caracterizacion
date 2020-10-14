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

    public function handle($request, Closure $next, ... $roles)
    {
        foreach($roles as $role){
            #Validacion para usuarios Superadmin/Servicios Campus-GHDO/
            if (Auth::user()->rol->nombre == $role) {

               return $next($request);
            }
        }
        return redirect('caracterizacion');
    }
}
