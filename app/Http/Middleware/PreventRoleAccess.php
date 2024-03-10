<?php

namespace App\Http\Middleware;

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PreventRoleAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is logged in and has the role of '2'
        if (Auth::check() && Auth::user()->role == 2) {
            // Redirect them to a different page or show an error
            return redirect('/home')->with('error', 'You do not have access to this page.');
        }

        return $next($request);
    }
//    public function handle(Request $request, Closure $next): Response
//    {
//        return $next($request);
//    }
}
