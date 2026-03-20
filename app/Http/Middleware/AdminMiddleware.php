<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         if (!auth()->check()) {
            return redirect()->route('login');
        }

        // Verificar si tiene permiso de administrador
        if (!auth()->user()->esAdmin()) {
            abort(403, 'No tienes permisos para acceder a esta sección. Solo Hermano Mayor, Secretario y Delegado pueden acceder.');
        }

        return $next($request);
    }
}
