<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;

// Add this route definition for the root path
Route::get('/', function () {
    return view('welcome');
});

Route::get('/registration', [UserController::class, 'registration'])->name('registration');
Route::post('/registration', [UserController::class, 'store'])->name('registration.store');
Route::view('/login','login')->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/crypto/{id}', function () {
    return view('/crypto');
});
Route::get('/buy', [CryptoController::class, 'buy'])->name('buy');
Route::view('/adminLogin', 'adminLogin')->name('adminLogin');
Route::view('/admin','admin')->name('admin');
Route::get('/user-management', [AdminController::class, 'userManagement'])->name('admin.user-management');
Route::delete('/user-management/{id}', [AdminController::class, 'deleteUser'])->name('admin.user-management.delete');
Route::get('/admin/orders', [AdminController::class, 'orders'])->name('admin.orders');
Route::get('/admin/reports', [AdminController::class, 'reports'])->name('admin.reports');