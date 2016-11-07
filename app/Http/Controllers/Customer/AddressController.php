<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit()
    {
        return view('customer.address');
    }

    public function update(Request $request)
    {
        return redirect()->route('customer.dashboard');
    }
}
