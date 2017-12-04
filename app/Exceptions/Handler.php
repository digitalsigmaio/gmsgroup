<?php

namespace App\Exceptions;

use Dotenv\Exception\ValidationException;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


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
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof HttpResponseException) {

            if ($request->expectsJson()) {
                return response()->json([
                    'data' => [
                        'message' => "Bad Request",
                        'status_code' => Response::HTTP_CONFLICT
                    ]
                ], Response::HTTP_CONFLICT);
            }

        } elseif ($exception instanceof AuthenticationException) {

            if ($request->expectsJson()) {
                return response()->json([
                    'data' => [
                        'message' => "Access Denied",
                        'status_code' => Response::HTTP_FORBIDDEN
                    ]
                ], Response::HTTP_FORBIDDEN);
            }

        } elseif ($exception instanceof MethodNotAllowedHttpException) {

            if ($request->expectsJson()) {
                return response()->json([
                    'data' => [
                        'message' => "Method not allowed",
                        'status_code' => Response::HTTP_BAD_REQUEST
                    ]
                ], Response::HTTP_BAD_REQUEST);
            }
        } elseif ($exception instanceof QueryException) {
            if ($request->expectsJson()) {
                return response()->json([
                    'data' => [
                        'message' => "Unaccepted query value",
                        'status_code' => Response::HTTP_NOT_ACCEPTABLE
                    ]
                ], Response::HTTP_BAD_REQUEST);
            }
        }

        if ($exception instanceof ModelNotFoundException) {
            $modelName = strtolower(class_basename($exception->getModel()));
            return response()->json([
                'data' => [
                    'message' => "Does not exists any {$modelName} with the specified identification",
                    'status_code' => Response::HTTP_NOT_FOUND
                ]
            ], Response::HTTP_NOT_FOUND);
        } elseif ($exception instanceof NotFoundHttpException) {
            return response()->json([
                'data' => [
                    'message' => 'Endpoint not found',
                    'status_code' => Response::HTTP_NOT_FOUND
                ]
            ], Response::HTTP_NOT_FOUND);
        }

        return parent::render($request, $exception);
    }
}
