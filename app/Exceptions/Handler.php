<?php

namespace App\Exceptions;

use App\Http\Middleware\JwtMiddleware;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Tymon\JWTAuth\Facades\JWTAuth;


class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        //
    }

//    public function render($request, Throwable $e)
//    {
//        dd($e->getStatusCode());
//
//        //dd($request);
////        if ($e->getStatusCode() == 404) {
////            // Define the response
////            return response()->json(["message" => "Not found"], 404);
////        }
//        if ($request->wantsJson()) {
//            // Define the response
//            $response = [
//                'errors' => 'Sorry, something went wrong.'
//            ];
//
//            // If this exception is an instance of HttpException
//            if ($this->isHttpException($e)) {
//                // Grab the HTTP status code from the Exception
//                $status = $e->getStatusCode();
//            }
//            return response()->json($response, $status);
//        }
//        // Default to the parent class' implementation of handler
//        //$status = $e->getStatusCode();
//       /// dd($this->isHttpException($e));
//        return parent::render($request, $e);
//    }

// ...

    public function render($request, Throwable $exception)
    {
        // dd($exception);
        if ($exception instanceof ModelNotFoundException /*&& $request->wantsJson()*/) {
            return response()->json(['message' => 'Not Found!'], 404);
        }
        if ($exception instanceof NotFoundHttpException) {
            return response()->json(['message' => 'Not Found!'], 404);
        }
        //$JwtMiddleware = new JwtMiddleware();
        // $JwtMiddleware->handle($request);
        if ($request->is('api/*')) {
            try {
                $user = JWTAuth::parseToken()->authenticate();
            } catch (Throwable $e) {
                if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                    return response()->json(['status' => 'Token is Invalid',
                        'error' => 'Unauthorized.'
                    ], 401);
                } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                    return response()->json(['status' => 'Token is Expired',
                        'error' => 'Unauthorized.'
                    ], 401);
                } else {
                    // dd("kkk");
                    return response()->json([
                        'status' => 'Authorization Token not found',
                        'error' => 'Unauthorized.'
                    ], 401);
                }
            }
        }
//        if (Auth::check() && in_array($request->user()->hasAnyRole(), $role)) {
//            return $next($request);
//        }
        //  return $next($request);
//        return response()->json([
//            'error' => 'Forbidden.'
//        ], 403);
        return parent::render($request, $exception);
    }
}
