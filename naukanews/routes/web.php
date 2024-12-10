<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('Index');
Route::get('/rubric/{id}', [IndexController::class, 'Rubric'])->name('rubric');
Route::get('/article/{id}', [IndexController::class, 'Article'])->name('article');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/add', [IndexController::class, 'AddArticle'])->name('add');
    Route::post('/add', [IndexController::class, 'Store'])->name('store');
    Route::delete('/delete/{id}', [IndexController::class, 'Delete'])->name('delete');
});
