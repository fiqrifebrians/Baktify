<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\UserController;

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



Route::get('/', [HomepageController::class, 'index'])->name('homepage');
Route::get('{id}/detail', [HomepageController::class, 'detail'])->name('homepage.detail');
Route::get('about', function () {
    return view('homepage.about');
})->name('homepage.about');
Route::group(['prefix' => 'user', 'middleware' => ['auth']], function () {
    Route::get('profile', [HomepageController::class, 'profile'])->name('homepage.profile');
    Route::post('profile-update', [HomepageController::class, 'profile_update'])->name('homepage.profile_update');
    Route::get('cart', [HomepageController::class, 'cart'])->name('homepage.cart');
    Route::get('add-to-cart/{product}', [HomepageController::class, 'add_to_cart'])->name('homepage.add-to-cart');
    Route::get('cart', [HomepageController::class, 'cart'])->name('homepage.cart');
    Route::get('checkout', [HomepageController::class, 'checkout'])->name('homepage.checkout');
    Route::get('transaction', [HomepageController::class, 'transaction'])->name('homepage.transaction');
});


Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', function () {
        return view('layout');
    })->name('dashboard');

    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category.index');
        Route::get('create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
        Route::post('{id}/update', [CategoryController::class, 'update'])->name('category.update');
        Route::get('{id}/delete', [CategoryController::class, 'delete'])->name('category.delete');
    });
    Route::prefix('product')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('product.index');
        Route::get('create', [ProductController::class, 'create'])->name('product.create');
        Route::post('store', [ProductController::class, 'store'])->name('product.store');
        Route::get('{id}/show', [ProductController::class, 'show'])->name('product.show');
        Route::get('{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
        Route::post('{id}/update', [ProductController::class, 'update'])->name('product.update');
        Route::get('{id}/delete', [ProductController::class, 'delete'])->name('product.delete');
    });
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::get('create', [UserController::class, 'create'])->name('user.create');
        Route::post('store', [UserController::class, 'store'])->name('user.store');
        Route::get('{id}/show', [UserController::class, 'show'])->name('user.show');
        Route::get('{id}/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::post('{id}/update', [UserController::class, 'update'])->name('user.update');
        Route::get('{id}/delete', [UserController::class, 'delete'])->name('user.delete');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
