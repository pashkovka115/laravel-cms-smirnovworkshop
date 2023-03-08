<?php

use Illuminate\Support\Facades\Route;


Route::get('', [\App\Http\Controllers\Admin\Contact\ContactController::class, 'index'])->name('admin.contact');
Route::get('create', [\App\Http\Controllers\Admin\Contact\ContactController::class, 'create'])->name('admin.contact.create');
Route::post('store', [\App\Http\Controllers\Admin\Contact\ContactController::class, 'store'])->name('admin.contact.store');
Route::get('edit/{id}', [\App\Http\Controllers\Admin\Contact\ContactController::class, 'edit'])->name('admin.contact.edit');
Route::post('update/{id}', [\App\Http\Controllers\Admin\Contact\ContactController::class, 'update'])->name('admin.contact.update');
Route::get('destroy/{id}', [\App\Http\Controllers\Admin\Contact\ContactController::class, 'destroy'])->name('admin.contact.destroy');

Route::post('product-category-columns-update', [\App\Http\Controllers\Admin\Contact\ContactColumnController::class, 'update'])->name('admin.contact.columns.update');

Route::post('add-property', [\App\Http\Controllers\Admin\Contact\ContactPropertyController::class, 'store'])->name('admin.contact.property.store');

