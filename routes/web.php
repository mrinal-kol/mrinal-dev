<?php

use Illuminate\Support\Facades\Route;

/*
*/

use App\Http\Controllers\HomeController;
use App\Http\Controllers\FormController;
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/submit', [FormController::class, 'submitForm'])->name('submitForm'); 

Route::get('/aboutus', [HomeController::class, 'aboutus'])->name('aboutus');
// use App\Http\Controllers\SchoolFormController;
// Route::get('/school_form', [SchoolFormController::class, 'school_form']);