<?php

use Illuminate\Support\Facades\Route;


Route::get('', [\App\Http\Controllers\Admin\Menu\MenuController::class, 'index'])->name('admin.menu');
Route::post('store', [\App\Http\Controllers\Admin\Menu\MenuController::class, 'store'])->name('admin.menu.store');
Route::get('edit/{id}', [\App\Http\Controllers\Admin\Menu\MenuController::class, 'edit'])->name('admin.menu.edit');
Route::post('update/{id}', [\App\Http\Controllers\Admin\Menu\MenuController::class, 'update'])->name('admin.menu.update');
Route::get('destroy/{id}', [\App\Http\Controllers\Admin\Menu\MenuController::class, 'destroy'])->name('admin.menu.destroy');


Route::prefix('menuitem')->group(function (){
    Route::get('edit/{id}', [\App\Http\Controllers\Admin\Menu\MenuItemController::class, 'edit'])->name('admin.menu_item.edit');
    Route::get('delete/{id}', [\App\Http\Controllers\Admin\Menu\MenuItemController::class, 'destroy'])->name('admin.menu_item.destroy');
    Route::post('update', [\App\Http\Controllers\Admin\Menu\MenuItemController::class, 'update'])->name('admin.menu_item.update');
    Route::post('store', [\App\Http\Controllers\Admin\Menu\MenuItemController::class, 'store'])->name('admin.menu_item.store');
});
