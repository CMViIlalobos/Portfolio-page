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
        // Prevent reporting to log files on Vercel to avoid Read-only errors
        $exceptions->reportable(function (\Throwable $e) {
            if (isset($_ENV['VERCEL']) || isset($_ENV['AWS_LAMBDA_FUNCTION_VERSION'])) {
                return false;
            }
        });
    })->create();

// Critical Fix for Vercel/Serverless: Move storage path to /tmp
// This prevents "Read-only file system" errors during boot
if (isset($_ENV['VERCEL']) || isset($_ENV['AWS_LAMBDA_FUNCTION_VERSION'])) {
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
