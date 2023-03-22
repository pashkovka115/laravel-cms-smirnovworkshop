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

Route::prefix('contact')->group(function (){
    Route::get('', [\App\Http\Controllers\Site\ContactController::class, 'show'])->name('site.contact');
    Route::post('store', [\App\Http\Controllers\Site\FeedbackController::class, 'store'])->name('site.contact.store');
});


// ============================= ADMIN =========================================================================
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');

    Route::prefix('category')->group(
        base_path('routes/admin/category_product.php'),
    );

    Route::prefix('product')->group(
        base_path('routes/admin/product.php'),
    );

    Route::prefix('feedback')->group(
        base_path('routes/admin/feedback.php'),
    );

    Route::prefix('contact')->group(
        base_path('routes/admin/contact.php'),
    );

    Route::prefix('menu')->group(
        base_path('routes/admin/menu.php'),
    );
});
// ============================= END ADMIN =========================================================================
