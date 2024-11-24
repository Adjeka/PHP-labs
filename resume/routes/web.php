<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

Route::get('/', [IndexController::class, 'Index']);
Route::get('/show', [IndexController::class, 'Show']);

Route::get('/personsWithExperience', [IndexController::class, 'GetPersonsWithExperience']);
Route::get('/programmers', [IndexController::class, 'GetProgrammers']);
Route::get('/totalResumes', [IndexController::class, 'GetTotalResumes']);
Route::get('/professions', [IndexController::class, 'GetStaffWithResumes']);
