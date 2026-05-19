<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\MerchantAuthenticate;
use App\Http\Middleware\RedirectIfMerchantAuthenticated;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    // Laravel 11 — bootstrap/app.php
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'auth.merchant' => MerchantAuthenticate::class,
            'merchant.guest' => RedirectIfMerchantAuthenticated::class,
        ]);
    })


    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
