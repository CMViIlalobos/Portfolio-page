<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // Fix for "Read-only file system" log error on Vercel
        $exceptions->reportable(function (\Throwable $e) {
            if (isset($_ENV['VERCEL'])) {
                return false; // Don't try to write to log file on Vercel
            }
        });
    })->create();
