<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    // ...existing code...

    public function userManagement() {
        $users = User::all();
        return view('admin.user-management', compact('users'));
    }

    public function deleteUser($id) {
        User::find($id)->delete();
        return redirect()->route('admin.user-management')->with('success', 'User deleted successfully');
    }

    public function orders()
    {
        // Logic to fetch and display orders
        return view('admin.orders');
    }

    public function reports()
    {
        // Logic to fetch and display reports
        return view('admin.reports');
    }

    // ...existing code...
}