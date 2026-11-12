<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )


    ->withMiddleware(function (Middleware $middleware): void {

        $middleware->redirectGuestsTo(function (Request $request) {

            // Redirect khusus halaman admin
            if (
                $request->is('panel/dashboardadmin') ||
                $request->is('panel/dashboardadmin/*')
            ) {
                return route('loginadmin');
            }

            // Redirect halaman karyawan
            return route('login');
        });

        // Redirect pengguna yang sudah login
        $middleware->redirectUsersTo(function (Request $request) {

            if (Auth::guard('user')->check()) {
                return route('dashboardadmin');
            }

            if (Auth::guard('karyawan')->check()) {
                return route('dashboard');
            }

            return route('login');
        });
    })

    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(
            fn(Request $request) => $request->is('api/*') || $request->expectsJson(),
        );
    })->create();
