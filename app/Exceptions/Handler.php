<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Handler extends ExceptionHandler
{

    // public function render($request, Throwable $e) //Dodana render metoda za handlanje gresaka
    // {
    //     if ($e instanceof ModelNotFoundException) {
    //         return response()->view('errors.404', [], 404);
    //     }

    //     if ($e instanceof ValidationException) {
    //         return $this->convertValidationExceptionToResponse($e, $request);
    //     }

    //     if ($e instanceof AuthenticationException) {
    //         return $this->unauthenticated($request, $e);
    //     }

    //     if ($e instanceof HttpException) {
    //         return $this->renderHttpException($e);
    //     }

    //     // Customize based on your needs
    //     // return parent::render($request, $e);
    //     return response()->view('errors.500', [], 500);
    // }

    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
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
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
