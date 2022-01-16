<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\StockController; 
use App\Http\Controllers\ProductController; 
use App\Repository\Eloquent\StockRepository;
use App\Repository\Eloquent\OrderRepository;
use App\Repository\Eloquent\ProductRepository;
use App\Repository\OrderRepositoryInterface; 
use App\Repository\EloquentRepositoryInterface; 

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->when(StockController::class)->needs(EloquentRepositoryInterface::class)->give(StockRepository::class);
        $this->app->when(ProductController::class)->needs(EloquentRepositoryInterface::class)->give(ProductRepository::class);
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
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
