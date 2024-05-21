<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Middleware\AuthenticateAdmin;
use Illuminate\Support\Facades\Route;

Route::middleware(AuthenticateAdmin::class)
    ->prefix('/admin')
    ->name('admin.')
    ->group(
        function () {
            Route::withoutMiddleware(AuthenticateAdmin::class)
                ->group(function () {
                    Route::post('/login', [AuthController::class, 'login'])
                        ->name('login.post');
                    Route::get('/login', function () {
                        return view('admin.login');
                    })->name('login');
                });


            Route::get('/logout', [AuthController::class, 'logout'])
                ->name('logout');


            Route::get('/', DashboardController::class)->name('dashboard');

            Route::resource('users', \App\Http\Controllers\Admin\UsersController::class)->only(['index', 'show', 'destroy']);
            Route::resource('products', \App\Http\Controllers\Admin\ProductsController::class);
            Route::resource('categories', \App\Http\Controllers\Admin\CategoriesController::class)->only(['index', 'destroy', 'create', 'store', 'edit', 'update']);
            Route::resource('orders', \App\Http\Controllers\Admin\OrdersController::class);
        }
    );