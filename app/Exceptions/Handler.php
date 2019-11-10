<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

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
        return parent::render($request, $exception);
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }
        if ($request->is('outpatient') || $request->is('outpatient/*')) {
            return redirect()->guest('/outpatient/login');
        }
        if ($request->is('clinicstaff') || $request->is('clinicstaff/*')) {
            return redirect()->guest('/clinicstaff/login');
        }
        return redirect()->guest(url('/'));
    }

}

//test
// namespace App\Exceptions;

// use Exception;
// use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

// use Illuminate\Auth\AuthenticationException;
// use Auth; 

// class Handler extends ExceptionHandler
// {
   
//     protected function unauthenticated($request, AuthenticationException $exception)
//     {
//         if ($request->expectsJson()) {
//             return response()->json(['error' => 'Unauthenticated.'], 401);
//         }
//         if ($request->is('outpatient') || $request->is('outpatient/*')) {
//             return redirect()->guest('/login/outpatient');
//         }
//         if ($request->is('clinicstaff') || $request->is('clinicstaff/*')) {
//             return redirect()->guest('/login/clinicstaff');
//         }
//         return redirect()->guest(route('login'));
//     }
// }