<?php

use Illuminate\Support\Facades\Route;


Route::get('', [\App\Http\Controllers\Admin\Menu\MenuController::class, 'index'])->name('admin.menu');
//Route::get('create', [\App\Http\Controllers\Admin\Product\ProductController::class, 'create'])->name('admin.product.create');
Route::post('store', [\App\Http\Controllers\Admin\Menu\MenuController::class, 'store'])->name('admin.menu.store');
Route::get('edit/{id}', [\App\Http\Controllers\Admin\Menu\MenuController::class, 'edit'])->name('admin.menu.edit');
Route::post('update/{id}', [\App\Http\Controllers\Admin\Menu\MenuController::class, 'update'])->name('admin.menu.update');
Route::get('destroy/{id}', [\App\Http\Controllers\Admin\Menu\MenuController::class, 'destroy'])->name('admin.menu.destroy');
//
//Route::post('product-category-columns-update', [\App\Http\Controllers\Admin\Product\ProductColumnController::class, 'update'])->name('admin.product.columns.update');
//
//Route::post('add-property', [\App\Http\Controllers\Admin\Product\ProductPropertyController::class, 'store'])->name('admin.product.property.store');


Route::prefix('menuitem')->group(function (){
    Route::get('edit/{id}', [\App\Http\Controllers\Admin\Menu\MenuItemController::class, 'edit'])->name('admin.menu_item.edit');
});
