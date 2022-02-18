<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\CartItem;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\ProductsRepository',
            'App\Repositories\ProductsRepositoryEloquent'
        );
        $this->app->bind(
            'App\Repositories\CartItemsRepository',
            'App\Repositories\CartItemsRepositoryEloquent'
        );
        $this->app->bind(
            'App\Repositories\OrdersRepository',
            'App\Repositories\OrdersRepositoryEloquent'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $cartItemsCount = CartItem::count();
        view()->share('cartItemsCount', $cartItemsCount);
    }
}
