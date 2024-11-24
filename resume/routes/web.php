<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

Route::get('/', [IndexController::class, 'Index'])->name('home');
Route::get('/show/{id}', [IndexController::class, 'Show'])->name('show');

Route::get('/personsWithExperience', [IndexController::class, 'GetPersonsWithExperience']);
Route::get('/programmers', [IndexController::class, 'GetProgrammers']);
Route::get('/totalResumes', [IndexController::class, 'GetTotalResumes']);
Route::get('/professions', [IndexController::class, 'GetStaffWithResumes']);

// Страница добавления резюме
Route::get('/create', [IndexController::class, 'create'])->name('create');

// Обработка формы добавления резюме
Route::post('/', [IndexController::class, 'store'])->name('store');

// Страница редактирования резюме
Route::get('/{person}/edit', [IndexController::class, 'edit'])->name('edit');

// Обработка формы редактирования резюме
Route::put('/{person}', [IndexController::class, 'update'])->name('update');

// Удаление резюме
Route::delete('/{person}', [IndexController::class, 'delete'])->name('delete');
