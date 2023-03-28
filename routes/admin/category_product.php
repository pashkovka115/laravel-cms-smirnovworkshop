<?php
use Illuminate\Support\Facades\Route;


Route::get('', [\App\Http\Controllers\Admin\Category\UserController::class, 'index'])->name('admin.product_category');
Route::get('create', [\App\Http\Controllers\Admin\Category\UserController::class, 'create'])->name('admin.product_category.create');
Route::post('store', [\App\Http\Controllers\Admin\Category\UserController::class, 'store'])->name('admin.product_category.store');
Route::get('edit/{id}', [\App\Http\Controllers\Admin\Category\UserController::class, 'edit'])->name('admin.product_category.edit');
Route::post('update/{id}', [\App\Http\Controllers\Admin\Category\UserController::class, 'update'])->name('admin.product_category.update');
Route::get('destroy/{id}', [\App\Http\Controllers\Admin\Category\UserController::class, 'destroy'])->name('admin.product_category.destroy');

Route::post('product-category-columns-update', [\App\Http\Controllers\Admin\Category\CategoryProductColumnController::class, 'update'])->name('admin.product_category.columns.update');

Route::post('add-property', [\App\Http\Controllers\Admin\Category\CategoryProductPropertyController::class, 'store'])->name('admin.product_category.property.store');
