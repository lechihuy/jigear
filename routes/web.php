<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CatalogController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderItemController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\DeliveryAddressController;
use App\Http\Controllers\Admin\ProductParameterController;
use App\Http\Controllers\Admin\ProductParameterSetController;
use App\Http\Controllers\Admin\Auth\LoginController as LoginAdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/
Route::get('/', HomeController::class)->name('home');

Route::get('/search', SearchController::class)->name('search');

Route::get('/product-detail', function () {
    return view('product-detail');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/category', function () {
    return view('category');
});

Route::get('/profile', function () {
    return view('profile-user');
});

Route::get('/change-password', function () {
    return view('change-password-user');
});

Route::get('/address', function () {
    return view('address-user');
});

Route::get('/order', function () {
    return view('order');
});

Route::get('/order-detail', function () {
    return view('order-detail');
});

Route::get('/new-address', function() {
    return view('new-address-user');
});

Route::name('auth.')->group(function() {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
});


Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])
    ->name('password.request');

Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetPasswordLink'])
    ->name('password.email');

Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])
    ->name('password.reset');

Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])
    ->name('password.update');


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/
Route::prefix('admin')->name('admin.')->group(function() {
    /* Auth Routes */
    Route::name('auth.')->controller(LoginAdminController::class)->group(function() {
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
        Route::get('/orders/status', [OrderController::class, 'statisticOrderStatus'])->name('orders.status');

        Route::get('/products/total', [ProductController::class, 'statisticTotalProduct'])->name('products.total');
        Route::get('/products/status', [ProductController::class, 'statisticStatusProduct'])->name('products.status');
        Route::get('/products/stock', [ProductController::class, 'statisticStockProduct'])->name('products.stock');

        Route::get('/users/total', [UserController::class, 'statisticTotalUser'])->name('users.total');
        Route::get('/users/role', [UserController::class, 'statisticRoleUser'])->name('users.role');
        Route::get('/users/stock', [UserController::class, 'statisticTotalCustomerOrdered'])->name('users.ordered');
    });
});

Route::get('/{slug}', DetailController::class)->name('detail');