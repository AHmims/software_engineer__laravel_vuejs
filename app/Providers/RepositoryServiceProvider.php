<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repository\Product\ProductRepositoryInterface', 'App\Repository\Product\ProductRepository');
        $this->app->bind('App\Repository\Category\CategoryRepositoryInterface', 'App\Repository\Category\CategoryRepository');
        $this->app->bind('App\Services\Product\ProductServiceInterface', 'App\Services\Product\ProductService');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
