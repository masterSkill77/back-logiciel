<?php

namespace App\Http\Middleware;

use App\Enum\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $roles): Response
    {

        if (Auth::user() && Auth()->user()->role == $roles) {
            return $next($request);
        }
        abort(403, 'Vous devez être super admin pour pouvoir faire cette action');
    }
}
