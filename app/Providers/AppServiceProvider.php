<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\CartItem;
use Illuminate\Support\Facades\Schema;

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
        $this->app->bind(
            'App\Repositories\OrderItemsRepository',
            'App\Repositories\OrderItemsRepositoryEloquent'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {   
        if(Schema::hasTable('cart_items')) {
            $cartItemsCount = CartItem::count();
            view()->share('cartItemsCount', $cartItemsCount);
        }
       
    }
}
