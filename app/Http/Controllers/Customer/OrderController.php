<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the customer's invoices.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customer.orders');
    }

    /**
     * Display an specified invoice.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        // @todo check the invoice belongs to the customer
        // $this->authorize('show', $order);

        return view('customer.invoice');
    }
}
