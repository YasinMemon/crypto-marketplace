<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function adminLogin() 
    {
        return view('adminLogin');    
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);
    }

    public function authenticate(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if ($email === 'johndoe2007@gmail.com' && $password === 'iamadmin') {
            return redirect('/admin')->with('success', 'Login successful!');
        } else {
            return redirect('/adminLogin')->with('error', 'Invalid credentials.');
        }
    }

    public function index()
    {
        $users = User::all();
        return view('admin', ['users' => $users]);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.index')->with('success', 'User deleted successfully.');
    }
}
