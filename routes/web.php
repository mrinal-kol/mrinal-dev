<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\UpdateController;

// Public routes
Route::get('/', [UpdateController::class, 'index'])->name('home');
Route::get('/login', [UpdateController::class, 'index'])->name('login');
Route::post('/login', [UpdateController::class, 'login'])->name('login.submit');

// Protected routes with only 'auth' middleware (optional)
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/update', [UpdateController::class, 'index'])->name('update');
    Route::post('/submit', [FormController::class, 'submitForm'])->name('submitForm');
    Route::get('/aboutus', [HomeController::class, 'aboutus'])->name('aboutus');
    Route::get('/services', [HomeController::class, 'services'])->name('services');
    Route::get('/Portfolio', [HomeController::class, 'Portfolio'])->name('Portfolio');
    Route::get('/contactus', [HomeController::class, 'contactus'])->name('contactus');
    Route::get('/fetchData/{id}', [HomeController::class, 'fetchData'])->name('fetchData');
    Route::get('/vue_example', [HomeController::class, 'vueExample'])->name('vue_example');
    
});
