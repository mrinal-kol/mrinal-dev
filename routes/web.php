<?php

use Illuminate\Support\Facades\Route;

/*
*/

use App\Http\Controllers\HomeController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\UpdateController;
Route::get('/', [\App\Http\Controllers\UpdateController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/update',[UpdateController::class,'index'])->name('update');
Route::post('/submit', [FormController::class, 'submitForm'])->name('submitForm'); 

Route::get('/aboutus', [HomeController::class, 'aboutus'])->name('aboutus');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/Portfolio', [HomeController::class, 'Portfolio'])->name('Portfolio');
Route::get('/contactus', [HomeController::class, 'contactus'])->name('contactus');
Route::get('/fetchData/{id}', [HomeController::class, 'fetchData'])->name('fetchData');
Route::get('/login', [UpdateController::class, 'index'])->name('login');
Route::post('/login', [UpdateController::class, 'login'])->name('login.submit');
// use App\Http\Controllers\SchoolFormController;
// Route::get('/school_form', [SchoolFormController::class, 'school_form']);