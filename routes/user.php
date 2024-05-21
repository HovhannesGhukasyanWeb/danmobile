<?php
use App\Http\Controllers\User\ProductsController;
use App\Http\Middleware\AuthenticateUser;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::prefix('/user')->name('user.')
    ->middleware(AuthenticateUser::class)
    ->group(function () {
        Route::get('/products', [ProductsController::class, 'index'])->name('products.index')->withoutMiddleware(AuthenticateUser::class);
        Route::get('/products/{product}', [ProductsController::class, 'show'])->name('products.show')->withoutMiddleware(AuthenticateUser::class);
    });