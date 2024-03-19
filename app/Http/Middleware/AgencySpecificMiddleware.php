<?php

namespace App\Http\Middleware;

use App\Exceptions\NotAllowedRessourceException;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AgencySpecificMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        $agencyId = $request->input('agency_id');

        if ((int) $user->agency_id !== (int) $agencyId)
            throw new NotAllowedRessourceException();
        return $next($request);
    }
}
