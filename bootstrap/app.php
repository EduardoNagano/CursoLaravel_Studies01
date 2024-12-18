<?php

use App\Http\Middleware\EndMiddleware;
use App\Http\Middleware\StartMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) { // Global

        // // Adicionar a todas as rotas - antes (prepend)
        // $middleware->prepend([
        //     StartMiddleware::class,
        //     EndMiddleware::class
        // ]);
        
        // // Adicionar a todas as rotas - final (append)
        // $middleware->append([
        //     StartMiddleware::class,
        //     EndMiddleware::class
        // ]);

        // Criar grupo de Middleware - antes (prepend)
        $middleware->prependToGroup('correr_antes', [
            StartMiddleware::class
        ]);

        // Criar grupo de Middleware - final (append)
        $middleware->appendToGroup('correr_depois', [
            EndMiddleware::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
