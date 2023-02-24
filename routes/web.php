<?php

use Illuminate\Support\Facades\Route;

Route::get('register', [\App\Http\Controllers\Auth\RegisterController::class, 'create'])->middleware('guest')->name('auth.register');
Route::post('store', [\App\Http\Controllers\Auth\RegisterController::class, 'store'])->middleware('guest')->name('auth.store');


// https://www.youtube.com/watch?v=yfxwAH3MbLY&list=PL-FhWbGlJPfZoUC9ApOR3isDIG88I_lj_


Route::get('/', [\App\Http\Controllers\Site\HomeController::class, 'index'])->name('site.home');

Route::prefix('admin')->group(function (){
    Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');

    Route::prefix('product')->group(function (){

    });
})->middleware('auth');

