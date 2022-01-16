<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
    // products routes
    Route::group(['prefix' => 'products', 'as' => 'products.'], function(){
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/store', [ProductController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [ProductController::class, 'update'])->name('update');
        Route::delete('/{id}', [ProductController::class, 'destroy'])->name('destroy');
    });
    // stocks routes
    Route::group(['prefix' => 'stocks', 'as' => 'stocks.'], function(){
        Route::get('/', [StockController::class, 'index'])->name('index');
        Route::get('/create', [StockController::class, 'create'])->name('create');
        Route::post('/store', [StockController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [StockController::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [StockController::class, 'update'])->name('update');
        Route::delete('/{id}', [StockController::class, 'destroy'])->name('destroy');
    });
    // order routes
    Route::group(['prefix' => 'order', 'as' => 'order.'], function(){
        Route::get('/income', [OrderController::class, 'incomePage'])->name('incomePage');
        Route::get('/outcome', [OrderController::class, 'outcomePage'])->name('outcomePage');
        Route::post('/income', [OrderController::class, 'income'])->name('income');
        Route::post('/outcome', [OrderController::class, 'outcome'])->name('outcome');
    });
});
