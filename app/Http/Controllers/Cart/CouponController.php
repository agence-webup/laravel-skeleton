<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Repositories\CouponRepository;
use App\Ecommerce\Cart\Discount;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    private $productRepo;

    public function __construct(CouponRepository $couponRepo)
    {
        $this->couponRepo = $couponRepo;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function use(Request $request)
    {
        $coupon = $this->couponRepo->getWithCode($request->get('code'));
        if (!$coupon) {
            $error = ['error' => "Ce code n'existe pas."];
            return response()->json($error, 404);
        }

        if ($coupon->expirationDate && $coupon->expirationDate < new \DateTime()) {
            $error = ['error' => "Ce coupon a expiré."];
            return response()->json($error, 422);
        }

        if ($coupon->customerId) {
            if (!$request->user()) {
                $error = ['error' => "Vous devez être connecté pour utilisé ce coupon."];
                return response()->json($error, 422);
            }

            if ($request->user()->id != $coupon->customerId) {
                $error = ['error' => "Ce coupon ne vous appartient pas."];
                return response()->json($error, 422);
            }
        }

        // add coupon to cart
        $cart = $request->session()->get('cart');
        $discount = new Discount($coupon->id);
        $discount->name = $coupon->name;
        $discount->valueType = $coupon->valueType;
        $discount->value = $coupon->value;
        $cart->addDiscount($discount);
    }
}
