<?php
use Illuminate\Support\Facades\Route;


Route::get('', [\App\Http\Controllers\Admin\Category\CategoryProductController::class, 'index'])->name('admin.category_product');
Route::get('create', [\App\Http\Controllers\Admin\Category\CategoryProductController::class, 'create'])->name('admin.category_product.create');
Route::post('store', [\App\Http\Controllers\Admin\Category\CategoryProductController::class, 'store'])->name('admin.category_product.store');
Route::get('edit/{id}', [\App\Http\Controllers\Admin\Category\CategoryProductController::class, 'edit'])->name('admin.category_product.edit');
Route::post('update/{id}', [\App\Http\Controllers\Admin\Category\CategoryProductController::class, 'update'])->name('admin.category_product.update');
Route::get('destroy/{id}', [\App\Http\Controllers\Admin\Category\CategoryProductController::class, 'destroy'])->name('admin.category_product.destroy');

Route::post('product-category-columns-update', [\App\Http\Controllers\Admin\Category\CategoryProductColumnController::class, 'update'])->name('admin.category_product.columns.update');

Route::post('add-additional-field', [\App\Http\Controllers\Admin\Category\CategoryProductAdditionalFieldsController::class, 'store'])->name('admin.category_product.additional_fields.store');
