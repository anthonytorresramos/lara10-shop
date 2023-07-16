<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PreventSoftDeletedUsersFromLoggingIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->deleted_at !== null) {
            Auth::logout();

            return redirect()->route('login')->with('error', 'You cannot log in with a soft deleted user.');
        }
        return $next($request);
    }
}
