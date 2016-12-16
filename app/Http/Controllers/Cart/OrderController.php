<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Jobs\Customer\CreateCustomer;
use App\Repositories\CustomerRepository;
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
    public function store(Request $request, CustomerRepository $customerRepo)
    {
        // validate order
        $this->validate($request, [
            'email' => 'required|email',
        ]);

        // create customer if doesn't exist or he's not logged
        if (!$request->user()) {
            if ($customerRepo->getByEmail($request->get('email'))) {
                return redirect(route('customer.login'))->with('loginMessage', trans("auth.account_already_exist"))->withInput(['email' => $request->get('email')]);
            } else {
                $customerData = [
                    'email' => $request->get('deliveryEmail', null),
                    'firstname' => $request->get('deliveryFirstname', null),
                    'lastname' => $request->get('deliveryLastname', null),
                    'address' => $request->get('deliveryAddress', null),
                    // 'address2' => $request->get('deliveryAddress2', null),
                    'postcode' => $request->get('deliveryPostcode', null),
                    'city' => $request->get('deliveryCity', null),
                ];
                $customer = $this->dispatchNow(new CreateCustomer($customerData));
                Auth::login($customer);
            }
        }

        // store order
        // ...

        return redirect()->route('payment.index')
            ->withInput($request->input());
            //->withErrors($e->errors());
    }
}
