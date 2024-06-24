<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRoleadmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login')->withErrors(['login' => 'Por favor, inicie sesión antes de acceder a esta ruta.']);
        }

        if (Auth::user()->rol_id != 2) {
            return redirect()->route('login')->withErrors(['login' => 'No tiene permisos para acceder a esta ruta.']);
        }

        return $next($request);
    }
}
