<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Jobs\Customer\CreateCustomer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Show the form to create an order.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // Fill address with logged user
        $customer = $request->user();
        if (!$customer) {
            $customer = new \App\Entities\Customer();
        }

        return view('cart.order', ['customer' => $customer]);
    }

    /**
     * Store a newly created order.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate order
        $this->validate($request, ['email' => 'required|email']);

        // create customer if doesn't exist or he's not logged
        if (!$request->user()) {
            $customer = $this->dispatchNow(new CreateCustomer($request->get('email')));
            Auth::login($customer);
        }

        // store order
        // ...

        return redirect()->route('payment.index');
    }
}
