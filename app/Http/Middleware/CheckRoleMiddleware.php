<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Periksa apakah pengguna memiliki peran yang diperlukan
        if (Auth::check() && Auth::user()->role == $role) {
            return $next($request);
        }

        // Jika tidak memiliki peran, kembalikan respons larangan
        abort(403, 'Unauthorized');
    }
}
