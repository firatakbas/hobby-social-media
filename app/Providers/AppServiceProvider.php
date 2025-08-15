<?php

namespace App\Providers;

use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Contracts\Repositories\UserRepositoryInterface::class,
            \App\Repositories\UserRepository::class
        );

        $this->app->bind(
            \App\Contracts\Repositories\ProfileRepositoryInterface::class,
            \App\Repositories\ProfileRepository::class
        );

        $this->app->bind(
            \App\Contracts\Repositories\PostRepositoryInterface::class,
            \App\Repositories\PostRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
