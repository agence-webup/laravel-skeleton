<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
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
        $product = $this->productRepo->get($request->get('id'));
        $quantity = $request->get('quantity');
        if (!$product) {
            throw new Exception("product not found", 1);
        }

        $cart = $request->session()->get('cart');

        $cartProduct = new \App\Ecommerce\Cart\Product($product->id);
        $cartProduct->setName($product->title);
        $cartProduct->setLink(route('catalog.product', ['slug' => $product->slug]));
        $cartProduct->setImage('https://placehold.it/100x100');
        $cartProduct->setPrice($product->price);
        $cartProduct->setTaxRate(0.2);
        $cartProduct->setQuantity($quantity);
        $cartProduct->setWeight(0.250);
        $cart->addProduct($cartProduct);
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

        $cart->updateProduct($id, $quantity);
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
        $cart->removeProduct($id);
    }
}
