<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Si el usuario está autenticado y su rol es 'admin', permite el acceso.
        if (auth()->check() && auth()->user()->role === 'admin') {
        return $next($request);
    }

    // Si no, redirige al dashboard con un mensaje de error.
    return redirect('/dashboard')->with('error', 'No tienes permiso para acceder a esta página.');
    }
}
