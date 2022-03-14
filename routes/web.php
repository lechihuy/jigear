<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CatalogController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\ProductParameterController;
use App\Http\Controllers\Admin\ProductParameterSetController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/
Route::get('/', function () {
    return view('welcome');
});


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/
Route::prefix('admin')->name('admin.')->group(function() {
    /* Auth Routes */
    Route::name('auth.')->controller(LoginController::class)->group(function() {
        Route::get('/login', 'showLoginForm')->name('login');
        Route::post('/login', 'store')->name('login.store');
        Route::post('/logout', 'logout')->name('logout');
    });

    /* Dashboard */
    Route::get('/', DashboardController::class)->name('dashboard');

    /* Resources management */
    Route::resources([
        'catalogs' => CatalogController::class,
        'products' => ProductController::class,
        'product-parameter-sets' => ProductParameterSetController::class,
        'product-parameter-sets.parameters' => ProductParameterController::class,
        'brands' => BrandController::class,
        'promotions' => PromotionController::class,
    ]);
});