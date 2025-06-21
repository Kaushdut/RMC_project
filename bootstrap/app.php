<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\RoleMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
    // Add it to global middleware stack
    $middleware->append([
        \App\Http\Middleware\NoCacheHeaders::class,
    ]);

    // Define middleware aliases
    $middleware->alias([
        'role' => \App\Http\Middleware\RoleMiddleware::class,
        'auth' => \App\Http\Middleware\Authenticate::class,
        'role_or' => \App\Http\Middleware\RoleOrMiddleware::class,

        // other aliases if needed
    ]);
})

    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->create();
