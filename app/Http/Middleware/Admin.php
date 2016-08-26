<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

use App\Role;

class Admin
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
        $role_id = Auth::user()->role_id;
        $id = Role::whereName('ROLE_ADMIN')->pluck('id')->first();

        if ( $role_id == $id )
        {
            return $next($request);
        }

        return redirect('/');
    }
}
