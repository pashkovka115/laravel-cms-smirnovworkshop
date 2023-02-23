<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [\App\Http\Controllers\Site\HomeController::class, 'index'])->name('home');
