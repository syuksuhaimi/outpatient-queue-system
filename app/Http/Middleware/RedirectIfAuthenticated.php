<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard('clinicstaff')->check()) {
            return redirect('/clinicstaff/home');
        }

        if (Auth::guard('outpatient')->check()) {
            return redirect('/outpatient/home');
        }

        if (Auth::guard($guard)->check()) {
            return redirect('/');
        }

        return $next($request);

    }
}

