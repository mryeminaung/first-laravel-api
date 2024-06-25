<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $role = auth()->user()->role;

        if ($role == 'admin') {
            return redirect('/panel/admin-panel');
        } else if ($role == 'guest') {
            return redirect('/panel/guest-panel');
        }

        return $next($request);
    }
}
