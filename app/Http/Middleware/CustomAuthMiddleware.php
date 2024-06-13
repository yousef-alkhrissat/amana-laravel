<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class CustomAuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        try {
            $token = JWTAuth::parseToken()->authenticate();

            if ($token) {
                return $next($request);
            }
        } catch (JWTException $e) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return response()->json(['message' => 'Unauthorized'], 401);
    }
}
