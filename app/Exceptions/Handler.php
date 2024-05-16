<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable; // Tambahkan ini

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
     * @param  \Throwable  $e // Perbarui ini
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $e) // Perbarui ini
    {
        parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $e // Perbarui ini
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable // Perbarui ini
     */
    public function render($request, Throwable $e) // Perbarui ini
    {
        return parent::render($request, $e);
    }
}
