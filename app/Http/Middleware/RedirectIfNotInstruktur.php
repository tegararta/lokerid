<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfNotInstruktur
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::guard('instruktur')->check()) {
            return redirect()->route('instruktur.login')->with('error', 'Anda harus login sebagai instruktur untuk mengakses halaman ini.');
        }

        return $next($request);
    }
}
