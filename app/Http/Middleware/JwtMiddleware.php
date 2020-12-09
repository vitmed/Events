<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use Throwable;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class JwtMiddleware  extends BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       // dd('jjj');
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Throwable $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return response()->json(['status' => 'Token is Invalid',
                    'error' => 'Unauthorized.'
                ],401);
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                return response()->json(['status' => 'Token is Expired',
                    'error' => 'Unauthorized.'
                ],401);
            }else{
                return response()->json([
                    'status' => 'Authorization Token not found',
                    'error' => 'Unauthorized.'
                ],401);
            }
        }
//        if (Auth::check() && in_array($request->user()->hasAnyRole(), $role)) {
//            return $next($request);
//        }
        return $next($request);
//        return response()->json([
//            'error' => 'Forbidden.'
//        ], 403);
    }
}
