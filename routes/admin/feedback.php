<?php

use Illuminate\Support\Facades\Route;


Route::get('', [\App\Http\Controllers\Admin\Feedback\FeedbackController::class, 'index'])->name('admin.feedback');
Route::get('create', [\App\Http\Controllers\Admin\Feedback\FeedbackController::class, 'create'])->name('admin.feedback.create');
Route::post('store', [\App\Http\Controllers\Admin\Feedback\FeedbackController::class, 'store'])->name('admin.feedback.store');
Route::get('edit/{id}', [\App\Http\Controllers\Admin\Feedback\FeedbackController::class, 'edit'])->name('admin.feedback.edit');
Route::post('update/{id}', [\App\Http\Controllers\Admin\Feedback\FeedbackController::class, 'update'])->name('admin.feedback.update');
Route::get('destroy/{id}', [\App\Http\Controllers\Admin\Feedback\FeedbackController::class, 'destroy'])->name('admin.feedback.destroy');

Route::post('product-category-columns-update', [\App\Http\Controllers\Admin\Feedback\FeedbackColumnController::class, 'update'])->name('admin.feedback.columns.update');

Route::post('add-property', [\App\Http\Controllers\Admin\Feedback\FeedbackPropertyController::class, 'store'])->name('admin.feedback.property.store');

