<?php

use Illuminate\Support\Facades\Route;


Route::get('', [\App\Http\Controllers\Admin\Page\PageController::class, 'index'])->name('admin.page');
Route::get('create', [\App\Http\Controllers\Admin\Page\PageController::class, 'create'])->name('admin.page.create');
Route::post('store', [\App\Http\Controllers\Admin\Page\PageController::class, 'store'])->name('admin.page.store');
Route::get('edit/{id}', [\App\Http\Controllers\Admin\Page\PageController::class, 'edit'])->name('admin.page.edit');
Route::post('update/{id}', [\App\Http\Controllers\Admin\Page\PageController::class, 'update'])->name('admin.page.update');
Route::get('destroy/{id}', [\App\Http\Controllers\Admin\Page\PageController::class, 'destroy'])->name('admin.page.destroy');

Route::post('product-category-columns-update', [\App\Http\Controllers\Admin\Page\PageColumnController::class, 'update'])->name('admin.page.columns.update');

Route::post('add-additional-field', [\App\Http\Controllers\Admin\Page\PageAdditionalFieldsController::class, 'store'])->name('admin.page.additional_fields.store');

