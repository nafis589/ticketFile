<?php

namespace App\Providers;

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
        \Illuminate\Support\Facades\Gate::policy(\App\Models\Counter::class, \App\Policies\CounterPolicy::class);

        \Illuminate\Support\Facades\Blade::if('role', function (string $role) {
            return auth()->check() && auth()->user()->role === $role;
        });
    }
}
