<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Jobs\Customer\CreateCustomer;
use App\Jobs\Order\CreateOrder;
use App\Repositories\CustomerRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Validator;

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
        try {
            $this->checkCartValidity($request);
        } catch (\Exception $e) {
            return redirect()->route('cart.index');
        }

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
        $this->checkCartValidity($request);

        $customer = $request->user();

        // create customer if doesn't exist or he's not logged
        if (!$customer) {
            try {
                $customerData = $this->validateCustomerFromOrderForm($request->all());

                if ($customerRepo->getByEmail($customerData['email'])) {
                    return redirect(route('customer.login'))->with('loginMessage', trans("auth.account_already_exist"))->withInput(['email' => $customerData['email']]);
                } else {
                    $customer = $this->dispatchNow(new CreateCustomer($customerData));
                    Auth::login($customer);
                }
            } catch (ValidationException $e) {
                return redirect()->back()
                    ->withInput($request->input())
                    ->withErrors($e->validator->errors());
            }
        }

        $data = $request->all();
        $data['customer_id'] = $customer->id;

        try {
            $cart = $request->session()->get('cart');
            $order = $this->dispatchNow(new CreateOrder($data, $cart));
        } catch (ValidationException $e) {
            return redirect()->back()
                ->withInput($request->input())
                ->withErrors($e->validator->errors());
        }

        $request->session()->put('orderId', $order->id);

        return redirect()->route('payment.index')
            ->withInput($request->input());
            //->withErrors($e->errors());
    }

    private function checkCartValidity(Request $request)
    {
        // check if cart is not empty
        $cart = $request->session()->get('cart');
        if (count($cart->products) == 0) {
            throw new \Exception("Cart is empty", 1);
        }
    }

    private function validateCustomerFromOrderForm(array $data)
    {
        $validator = Validator::make($data, [
            'billingFirstname' => 'required',
            'billingLastname' => 'required',
            'billingEmail' => 'required',
            'billingPhone' => 'required',
            'billingAddress' => 'required',
            'billingPostalcode' => 'required',
            'billingCity' => 'required',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $data = $validator->getData();

        return [
            'firstname' => $data['billingFirstname'],
            'lastname' => $data['billingLastname'],
            'email' => $data['billingEmail'],
            'phone' => $data['billingPhone'],
            'address' => $data['billingAddress'],
            'postalcode' => $data['billingPostalcode'],
            'city' => $data['billingCity'],
        ];
    }
}
