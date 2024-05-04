<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect('authenticate')->with('error', 'You must be logged in to access that page.');
        } elseif (!Auth::user()->isAdmin) {
            return redirect('show')->with('error', 'You are not authorized to access that page.');
        }

        return $next($request);
    }
}
