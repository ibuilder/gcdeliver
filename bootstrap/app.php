<?php

use App\Providers\AuthServiceProvider;
use Laravel\Ui\UiServiceProvider;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Foundation\Application;

$app = Application::configure(basePath: dirname(__DIR__))
    ->withProviders([
        AuthServiceProvider::class,
        UiServiceProvider::class,    ])
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
    )
    ->withExceptions(function (
        Exceptions $exceptions) {
        $exceptions->report(function (Throwable $e) {
            // Handle reporting of exceptions.
        });
    })
    ->withMiddleware(function (Middleware $middleware) {
    })
    ->create();
$app->booted(function () use ($app) {
    require __DIR__ . '/../routes/web.php';    
});


return $app;

