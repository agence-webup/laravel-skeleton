<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    private $productRepo;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = $this->productRepo->get($request->get('productId'));
        $quantity = $request->get('quantity');
        if (!$product) {
            throw new Exception("product not found", 1);
        }

        $cart = $request->session()->get('cart');

        $item = new \App\Entities\CartItem($product->id);
        $item->setName($product->title);
        $item->setPrice($product->price);
        $item->setTaxRate(0.2);
        $item->setQuantity($quantity);
        $item->setWeight(0.250);
        $cart->add($item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $quantity = $request->get('quantity');
        $cart = $request->session()->get('cart');

        $cart->update($id, $quantity);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $cart = $request->session()->get('cart');
        $cart->remove($id);
    }
}
