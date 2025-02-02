<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Add this route definition for the root path
Route::get('/', function () {
    return view('welcome');
});

Route::get('/registration', [UserController::class, 'registration'])->name('registration');
Route::post('/registration', [UserController::class, 'store'])->name('registration.store');
Route::view('/login','login')->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::view('/admin', 'admin');
Route::view('/adminLogin', 'adminLogin');
// Route::post('/adminLogin', [AdminController::class, 'store'])->name('adminLogin.store');

Route::get('/crypto/{id}', function () {
    return view('/crypto');
});
