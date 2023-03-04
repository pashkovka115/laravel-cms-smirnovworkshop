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
        Route::get('', [\App\Http\Controllers\Admin\Category\CategoryProductController::class, 'index'])->name('admin.product_category');
        Route::get('create', [\App\Http\Controllers\Admin\Category\CategoryProductController::class, 'create'])->name('admin.product_category.create');
        Route::post('store', [\App\Http\Controllers\Admin\Category\CategoryProductController::class, 'store'])->name('admin.product_category.store');
        Route::get('edit/{id}', [\App\Http\Controllers\Admin\Category\CategoryProductController::class, 'edit'])->name('admin.product_category.edit');
        Route::post('update/{id}', [\App\Http\Controllers\Admin\Category\CategoryProductController::class, 'update'])->name('admin.product_category.update');
        Route::get('destroy/{id}', [\App\Http\Controllers\Admin\Category\CategoryProductController::class, 'destroy'])->name('admin.product_category.destroy');

        Route::post('product-category-columns-update', [\App\Http\Controllers\Admin\Category\CategoryProductColumnController::class, 'update'])->name('admin.product_category.columns.update');

        Route::post('add-property', [\App\Http\Controllers\Admin\Category\CategoryProductPropertyController::class, 'store'])->name('admin.product_category.property.store');
    });

    Route::prefix('product')->group(function (){
        Route::get('', [\App\Http\Controllers\Admin\Product\ProductController::class, 'index'])->name('admin.product');
        Route::get('create', [\App\Http\Controllers\Admin\Product\ProductController::class, 'create'])->name('admin.product.create');
        Route::post('store', [\App\Http\Controllers\Admin\Product\ProductController::class, 'store'])->name('admin.product.store');
        Route::get('edit/{id}', [\App\Http\Controllers\Admin\Product\ProductController::class, 'edit'])->name('admin.product.edit');
        Route::post('update/{id}', [\App\Http\Controllers\Admin\Product\ProductController::class, 'update'])->name('admin.product.update');
        Route::get('destroy/{id}', [\App\Http\Controllers\Admin\Product\ProductController::class, 'destroy'])->name('admin.product.destroy');

        Route::post('product-category-columns-update', [\App\Http\Controllers\Admin\Product\ProductColumnController::class, 'update'])->name('admin.product.columns.update');

        Route::post('add-property', [\App\Http\Controllers\Admin\Product\ProductPropertyController::class, 'store'])->name('admin.product.property.store');
    });
});

