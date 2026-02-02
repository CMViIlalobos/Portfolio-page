<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

$app = Application::configure(basePath: dirname(__DIR__))
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
            if (isset($_ENV['VERCEL']) || isset($_ENV['AWS_LAMBDA_FUNCTION_VERSION'])) {
                return false; // Don't try to write to log file on Vercel
            }
        });
    })->create();

// Critical Fix for Vercel/Serverless: Move storage path to /tmp
// ONLY apply this if we are truly in a serverless environment
if (isset($_ENV['VERCEL']) || isset($_ENV['AWS_LAMBDA_FUNCTION_VERSION']) || isset($_SERVER['VERCEL'])) {
    $app->useStoragePath('/tmp');
    
    // Ensure the structure exists in /tmp
    if (!is_dir('/tmp/framework/views')) {
        @mkdir('/tmp/framework/views', 0755, true);
        @mkdir('/tmp/framework/cache/data', 0755, true);
        @mkdir('/tmp/framework/sessions', 0755, true);
        @mkdir('/tmp/logs', 0755, true);
    }
}

return $app;
