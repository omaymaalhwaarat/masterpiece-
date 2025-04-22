<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirect unauthenticated users to login
        }

        if (auth()->user()->role !== 'admin') {
            return abort(403, 'Unauthorized'); // Return 403 for non-admin users
        }

        return $next($request); // Allow the request to proceed for admins
    }
}