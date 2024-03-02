<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuruMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the authenticated user has the role of "Guru"
        if (Auth::check() && Auth::user()->role == 'Guru') {
            return $next($request);
        }

        // Redirect or handle unauthorized access
        return redirect()->route('dashboard')->with('error', 'Unauthorized access.');
    }
}
