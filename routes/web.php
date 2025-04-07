<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
Route::post('/adminLogin', function (Request $request) {
    $username = $request->input('username');
    $password = $request->input('password');

    if ($username === 'yasin' && $password === '12345') {
        session(['admin_logged_in' => true]);
        return redirect('/admin')->with('success', 'Welcome to the Admin Panel!');
    }

    return redirect()->back()->with('error', 'Invalid username or password.');
})->name('adminLogin.post');
Route::view('/admin','admin')->name('admin');
Route::get('/user-management', [AdminController::class, 'userManagement'])->name('admin.user-management');
Route::delete('/user-management/{id}', [AdminController::class, 'deleteUser'])->name('admin.user-management.delete');
Route::get('/admin/orders', [AdminController::class, 'orders'])->name('admin.orders');
Route::get('/admin/reports', function () {
    $orders = Session::get('orders', []);
    $totalSales = array_sum(array_column($orders, 'amount'));
    $newUsers = 50; // Replace with actual logic to fetch new user count
    $totalOrders = count($orders);
    $pendingOrders = count(array_filter($orders, fn($order) => $order['status'] === 'Pending'));
    $approvedOrders = count(array_filter($orders, fn($order) => $order['status'] === 'Approved'));
    $rejectedOrders = count(array_filter($orders, fn($order) => $order['status'] === 'Rejected'));

    return view('admin.reports', compact('totalSales', 'newUsers', 'totalOrders', 'pendingOrders', 'approvedOrders', 'rejectedOrders'));
})->name('admin.reports');
Route::post('/admin/logout', function () {
    Auth::logout();
    return redirect('/adminLogin')->with('success', 'Logged out successfully.');
})->name('admin.logout');

Route::post('/place-order', function (Request $request) {
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'You must be logged in to place an order.');
    }

    $orders = Session::get('orders', []);
    $orders[] = [
        'id' => count($orders) + 1,
        'customer' => Auth::user()->name,
        'crypto' => $request->input('crypto'),
        'amount' => (float) $request->input('amount'), // Cast to float to ensure numeric value
        'status' => 'Pending',
    ];
    Session::put('orders', $orders);
    return redirect('/')->with('success', 'Order placed successfully!');
})->name('place-order');

Route::get('/admin/orders', function () {
    $orders = Session::get('orders', []);
    return view('admin.orders', ['orders' => $orders]);
})->name('admin.orders');

Route::post('/admin/orders/{id}/approve', function ($id) {
    $orders = Session::get('orders', []);
    foreach ($orders as &$order) {
        if ($order['id'] == $id) {
            $order['status'] = 'Approved';
            break;
        }
    }
    Session::put('orders', $orders);
    return redirect()->route('admin.orders')->with('success', 'Order approved successfully!');
})->name('admin.orders.approve');

Route::post('/admin/orders/{id}/reject', function ($id) {
    $orders = Session::get('orders', []);
    foreach ($orders as &$order) {
        if ($order['id'] == $id) {
            $order['status'] = 'Rejected';
            break;
        }
    }
    Session::put('orders', $orders);
    return redirect()->route('admin.orders')->with('success', 'Order rejected successfully!');
})->name('admin.orders.reject');