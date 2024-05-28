<?php
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\ProductsController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\CardsController;
use App\Http\Middleware\AuthenticateUser;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/register', function () {
    return view('user.register');
});
Route::get('/login', function () {
    return view('user.login');
});

Route::post('/register', [AuthController::class, 'signUp']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('me', [ProfileController::class, 'me'])->middleware(AuthenticateUser::class);
Route::post('/update-profile', [ProfileController::class, 'updateProfile'])->middleware(AuthenticateUser::class);

Route::prefix('/user')->name('user.')
    ->middleware(AuthenticateUser::class)
    ->group(function () {
        Route::get('/products', [ProductsController::class, 'index'])->name('products.index')->withoutMiddleware(AuthenticateUser::class);
        Route::get('/products/{product}', [ProductsController::class, 'show'])->name('products.show')->withoutMiddleware(AuthenticateUser::class);
        Route::resource('cards', CardsController::class)->except(['create', 'edit']);
    });