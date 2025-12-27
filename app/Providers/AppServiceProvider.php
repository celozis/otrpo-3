<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Card;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

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
        Gate::define('update-delete-card', function (User $user, Card $card) {

            return $user->id === $card->user_id || (bool)$user->is_admin === true;
        });

        Gate::define('admin-actions', function (User $user) {
            return (bool)$user->is_admin === true;
        });
    }
}
