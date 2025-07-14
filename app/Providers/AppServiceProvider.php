<?php

namespace App\Providers;

use App\Models\User; // <-- Añade esta línea
use Illuminate\Support\Facades\Gate; // <-- Añade esta línea
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //===== AÑADE ESTE CÓDIGO AQUÍ =====
        Gate::define('isAdmin', function (User $user) {
            return $user->role === 'admin';
        });
    }
}
