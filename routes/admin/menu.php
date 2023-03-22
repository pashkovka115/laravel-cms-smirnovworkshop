<?php

use Illuminate\Support\Facades\Route;


Route::get('', [\App\Http\Controllers\Admin\Menu\MenuController::class, 'index'])->name('admin.menu');
//Route::get('create', [\App\Http\Controllers\Admin\Product\ProductController::class, 'create'])->name('admin.product.create');
//Route::post('store', [\App\Http\Controllers\Admin\Product\ProductController::class, 'store'])->name('admin.product.store');
//Route::get('edit/{id}', [\App\Http\Controllers\Admin\Product\ProductController::class, 'edit'])->name('admin.product.edit');
//Route::post('update/{id}', [\App\Http\Controllers\Admin\Product\ProductController::class, 'update'])->name('admin.product.update');
//Route::get('destroy/{id}', [\App\Http\Controllers\Admin\Product\ProductController::class, 'destroy'])->name('admin.product.destroy');
//
//Route::post('product-category-columns-update', [\App\Http\Controllers\Admin\Product\ProductColumnController::class, 'update'])->name('admin.product.columns.update');
//
//Route::post('add-property', [\App\Http\Controllers\Admin\Product\ProductPropertyController::class, 'store'])->name('admin.product.property.store');

