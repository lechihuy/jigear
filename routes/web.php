<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CatalogController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderItemController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DeliveryAddressController;
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
        // 'promotions' => PromotionController::class,
        'orders' => OrderController::class,
        'orders.items' => OrderItemController::class,
        'users' => UserController::class,
        'users.delivery-addresses' => DeliveryAddressController::class,
    ]);

    /* Setting */
    Route::get('/setting', [SettingController::class, 'showSettingForm'])->name('setting');
    Route::put('/setting', [SettingController::class, 'store'])->name('setting.update');

    /* Statistics */
    Route::prefix('statistics')->name('statistics.')->group(function() {
        Route::get('/orders/total', [OrderController::class, 'statisticTotalOrder'])->name('orders.total');
        Route::get('/orders/revenue', [OrderController::class, 'statisticRevenue'])->name('orders.revenue');
    });
});