<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Jobs\Customer\UpdateCustomer;
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
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'address' => 'required',
            'postcode' => 'required',
            'city' => 'required',
        ]);

        $this->dispatchNow(new UpdateCustomer($request->user()->id, $request->all()));

        return redirect()->route('customer.dashboard');
    }
}
