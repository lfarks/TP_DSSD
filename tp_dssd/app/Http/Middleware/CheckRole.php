<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, ...$role)
    {
        if (! $request->user()->hasAnyRole($role)) {
          return redirect()->route('home')->with('error', 'No tiene permisos para acceder a esta página, debes ser '.implode(",",$role).', sos '.$request->user()->roles()->first()['name']);

        }

        return $next($request);
    }

}
