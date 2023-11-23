<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
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

        $this->renderable(function (NotFoundHttpException $e, $request) {
            if($request->wantsJson()) {
                return response()->json([
                    'message' => 'Object Not Found',
                    'status'  => 404,
                ]);
            }
        });
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof TokenMismatchException) {
            return redirect()->route('login')->withErrors(['message' => 'CSRF token mismatch. Please log in again.']);
        }

        if ($exception instanceof NotFoundHttpException) {
            return back()->withErrors([
                'delayMessage' => 'Page not found. Redirecting in 3 seconds...', // Your delay message
                'delaySeconds' => 3, // Delay in seconds
            ]);
        }

        if ($exception instanceof \Spatie\Permission\Exceptions\UnauthorizedException) {
            $this->renderable(function (\Spatie\Permission\Exceptions\UnauthorizedException $e, $request) {
                return redirect()->route('dashboard')->withErrors(['message' => 'You are not authorized to access this page.']);
            });
        }


        return parent::render($request, $exception);
    }
}
