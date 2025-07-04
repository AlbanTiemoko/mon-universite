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
    ->withMiddleware(function (Middleware $middleware) {
        // Ajoutez cette ligne
        $middleware->alias([
            'prevent.web.user' => App\Http\Middleware\PreventWebUser::class,
        ]);
        
        // Ou pour ajouter plusieurs middlewares :
        $middleware->alias([
            'prevent.web.user' => App\Http\Middleware\PreventWebUser::class,
            'admin' => App\Http\Middleware\RedirectIfNotAdmin::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();