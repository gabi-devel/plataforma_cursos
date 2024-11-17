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
                return redirect()->route('login');
            }
        }

        return $next($request);
    }
}
