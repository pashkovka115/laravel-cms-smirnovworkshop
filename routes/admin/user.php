<?php

use Illuminate\Support\Facades\Route;


Route::get('', [\App\Http\Controllers\Admin\Users\UserController::class, 'index'])->name('admin.user');
Route::get('create', [\App\Http\Controllers\Admin\Users\UserController::class, 'create'])->name('admin.user.create');
Route::post('store', [\App\Http\Controllers\Admin\Users\UserController::class, 'store'])->name('admin.user.store');
Route::get('edit/{id}', [\App\Http\Controllers\Admin\Users\UserController::class, 'edit'])->name('admin.user.edit');
Route::post('update/{id}', [\App\Http\Controllers\Admin\Users\UserController::class, 'update'])->name('admin.user.update');
Route::get('destroy/{id}', [\App\Http\Controllers\Admin\Users\UserController::class, 'destroy'])->name('admin.user.destroy');

//Route::post('product-category-columns-update', [\App\Http\Controllers\Admin\Feedback\FeedbackColumnController::class, 'update'])->name('admin.feedback.columns.update');

//Route::post('add-property', [\App\Http\Controllers\Admin\Feedback\FeedbackPropertyController::class, 'store'])->name('admin.feedback.property.store');

