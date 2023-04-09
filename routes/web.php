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


// ============================= ADMIN =========================================================================
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');

    Route::prefix('category')->group(
        base_path('routes/admin/category_product.php'),
    );

    /*Route::prefix('product')->group(
        base_path('routes/admin/product.php'),
    );*/

    Route::prefix('feedback')->group(
        base_path('routes/admin/feedback.php'),
    );

    Route::prefix('page')->group(
        base_path('routes/admin/pages.php'),
    );

    Route::prefix('user')->group(
        base_path('routes/admin/user.php'),
    );

    Route::prefix('menu')->group(
        base_path('routes/admin/menu.php'),
    );

    Route::prefix('ajax')->group(
        base_path('routes/admin/ajax.php'),
    );

    // тестовый роутер для динамических модулей
    Route::prefix('{module}')->group(function (){
        Route::get('', [\App\Included\Classes\Modules\Module::class, 'index'])->name('admin.module');
        Route::get('create', [\App\Included\Classes\Modules\Module::class, 'create'])->name('admin.module.create');
        Route::post('store', [\App\Included\Classes\Modules\Module::class, 'store'])->name('admin.module.store');
        Route::get('edit/{id}', [\App\Included\Classes\Modules\Module::class, 'edit'])->name('admin.module.edit');
        Route::post('update/{id}', [\App\Included\Classes\Modules\Module::class, 'update'])->name('admin.module.update');
        Route::get('destroy/{id}', [\App\Included\Classes\Modules\Module::class, 'destroy'])->name('admin.module.destroy');

//        Route::post('product-category-columns-update', [\App\Http\Controllers\Admin\Product\ProductColumnController::class, 'update'])->name('admin.module.columns.update');
//        Route::post('add-additional-field', [\App\Http\Controllers\Admin\Product\ProductAdditionalFieldsController::class, 'store'])->name('admin.product.module.store');
    });
});
// ============================= END ADMIN =========================================================================

// Сохранение сообщений со страницы контактов
Route::post('feedback/store', [\App\Http\Controllers\Site\FeedbackController::class, 'store'])->name('site.feedback.store');



// default
Route::prefix('{alias}')->group(function (){
    Route::get('', [\App\Http\Controllers\Site\PageController::class, 'show'])->name('site.page');
});
