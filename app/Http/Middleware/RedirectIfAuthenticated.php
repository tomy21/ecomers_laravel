<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if ($guard === 'web') {
                    return redirect()->route('dashboard')->with('error', 'Anda sudah login sebagai admin.');
                } elseif ($guard === 'admin') {
                    return redirect()->route('pelanggan')->with('error', 'Anda sudah login sebagai pelanggan.');
                }
            }
        }

        return $next($request);
    }
}
