<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class EmpresaMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->empresa) {
            return $next($request);
        }
        return redirect()->route('login');
    }
}
