<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if (Auth::user()->roles[0]->name == 'Manager') {
                    return redirect('/admin/managers');
                }
                if (Auth::user()->roles[0]->name == 'Supervisor') {
                    return redirect('/admin/supervisors');
                }
                if (Auth::user()->roles[0]->name == 'Staff') {
                    return redirect('/admin/staffs');
                }
                return redirect(RouteServiceProvider::HOME);
            }
        }
        return $next($request);
    }
}
