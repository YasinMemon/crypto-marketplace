<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CryptoController extends Controller
{
    public function buy()
    {
        return view('buy');
    }

    public function purchase(Request $request)
    {
        $amount = $request->input('amount');
        // Logic to handle the purchase, e.g., save to database, process payment, etc.
        return redirect()->back()->with('success', 'Purchase successful!');
    }
}
