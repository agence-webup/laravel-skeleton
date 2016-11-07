<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Show payment method
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cart.payment');
    }

    public function success()
    {
        // send mail merci de votre commande
        return view('cart.success');
    }
}
