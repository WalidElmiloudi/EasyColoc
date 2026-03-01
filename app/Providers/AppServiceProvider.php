<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
        view()->composer('*', function () {
            $user = Auth::user();

            if ($user && $user->status === 'banned') {
                $allowedRoutes = ['login', 'register'];
                $currentRoute = Route::currentRouteName();

                if (!in_array($currentRoute, $allowedRoutes)) {
                    Auth::logout();
                    redirect()->route('login')
                        ->withErrors('Your account is banned.')
                        ->send();
                }
            }
        });
    }
}
