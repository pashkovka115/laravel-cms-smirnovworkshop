<?php

use Illuminate\Support\Facades\Route;

Route::get('register', [\App\Http\Controllers\Auth\RegisterController::class, 'register'])->middleware('guest')->name('register');
Route::post('store', [\App\Http\Controllers\Auth\RegisterController::class, 'store'])->middleware('guest')->name('auth.store');

Route::get('login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->middleware('guest')->name('login');
Route::post('check', [\App\Http\Controllers\Auth\LoginController::class, 'check'])->middleware('guest')->name('auth.check');
Route::get('logout', [\App\Http\Controllers\Auth\LoginController::class, 'destroy'])->middleware('auth')->name('logout');

Route::get('forgot-password', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'create'])->middleware('guest')->name('forgot-password');
Route::post('forgot-password', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'store'])->middleware('guest')->name('password.email');

Route::get('reset-password', [\App\Http\Controllers\Auth\ResetPasswordController::class, 'create'])->middleware('guest')->name('password.reset');


// Auth: https://www.youtube.com/watch?v=yfxwAH3MbLY&list=PL-FhWbGlJPfZoUC9ApOR3isDIG88I_lj_


Route::get('/', [\App\Http\Controllers\Site\HomeController::class, 'index'])->name('site.home');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function (){
    Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');

    Route::prefix('category')->group(function (){
        Route::get('', [\App\Http\Controllers\Admin\Category\ProductCategoryController::class, 'index'])->name('admin.product.category');
        Route::get('create', [\App\Http\Controllers\Admin\Category\ProductCategoryController::class, 'create'])->name('admin.product.category.create');

        Route::post('product-category-columns-update', [\App\Http\Controllers\Admin\Category\ProductCategoryColumnController::class, 'update'])->name('admin.product.category.columns.update');
    });

    Route::prefix('product')->group(function (){

    });
});

