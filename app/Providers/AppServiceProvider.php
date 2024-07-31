<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\User\CartRepository;
use App\Repositories\User\CartRepositoryInterface;
use App\Repositories\User\WishlistRepository;
use App\Repositories\User\WishlistRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CartRepositoryInterface::class, CartRepository::class);
        $this->app->bind(WishlistRepositoryInterface::class, WishlistRepository::class);
        $this->app->bind(CartRepositoryInterface::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
