<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

Route::get('/', [IndexController::class, 'Index'])->name('home');
Route::get('/show', [IndexController::class, 'Show'])->name('show');
