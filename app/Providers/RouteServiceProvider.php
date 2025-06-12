<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
 use Illuminate\Support\Facades\Auth;
class RouteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public static function redirectByRole()
{
    $role = auth()->user()->role;

    return match ($role) {
        'admin' => '/admin-dashboard',
        'meteorologist' => '/meteorologist-dashboard',
        'observer' => '/observer-dashboard',
        default => '/login',
    };
}

    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
