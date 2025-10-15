<?php

use App\Http\Middleware\VerifyAccessKey;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    //Cabe la posibilidad de que deba dejar esto vacío y añadir la linea solo abajo
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->append(VerifyAccessKey::class);
    })
    
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->renderable(function (NotFoundHttpException $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 404);
        });
    })->create();
