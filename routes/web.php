<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;

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
    Route::name('auth.')->group(function() {
        Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    });
});