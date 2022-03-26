<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CatalogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/
Route::get('/', function () {
    return view('home');
});

Route::get('/product-detail', function () {
    return view('product-detail');
});

Route::get('/login', function() {
    return view('auth.login');
});

Route::get('/register', function() {
    return view('auth.register');
});

Route::get('/forgot-password', function() {
    return view('auth.forgot-password');
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
        'catalogs' => CatalogController::class
    ]);
});
