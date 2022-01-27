<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string $role
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role = 'customer')
    {
        if (Auth::guest() || Auth::user()->role !== $role) {
            $redirectRoute = match($role) {
                'admin' => 'admin.auth.login',
                'customer' => 'login'
            };

            return redirect()->route($redirectRoute);
        }

        return $next($request);
    }
}
