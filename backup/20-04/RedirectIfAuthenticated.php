<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
                //dd("Guardia: $guard, Usuario autenticado: " . Auth::guard($guard)->user());
            if (Auth::guard($guard)->check()) { 
                $user = Auth::user();
                //return ($user->rol === 'admin') ? redirect('/admin/dashboard') : redirect('/cursos');

                // Redirección basada en el rol
                return match ($user->rol) {
                    'admin' => redirect('/admin/dashboard'),
                    'profesor' => redirect()->route('profesores.home'),
                    default => redirect('/cursos'),
                };
            }
        }

        return $next($request);
    }
}
