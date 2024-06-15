<?php

namespace App\Http\Middleware;

use App\Http\Resources\ApiResource;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Hire
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user('sanctum') && $request->user('sanctum')->role == 'hire') {
            return $next($request);
        } else {
            return response()->json(new ApiResource(403, false, 'Forbidden: You do not have access.', null), 403);
        }
    }
}
