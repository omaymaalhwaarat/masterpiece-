<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $role)
    {
        if (!auth()->check()) {
            return redirect()->route('login'); // Redirect unauthenticated users to login
        }

        if (auth()->user()->role !== $role) {
            return abort(403, 'Unauthorized'); // Return 403 for unauthorized users
        }

        return $next($request); // Allow access if role matches
    }
}