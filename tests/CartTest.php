<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Ecommerce\Cart\Cart;
use App\Ecommerce\Cart\Product;
use App\Ecommerce\Cart\Discount;

class CartTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testProduct()
    {
        $product = new Product(1);
        $product->price = 10;
        $product->taxRate = 0.2;
        $product->quantity = 10;

        $this->assertEquals(10, $product->price);
        $this->assertEquals(0.2, $product->taxRate);
        $this->assertEquals(2, $product->tax);
        $this->assertEquals(12, $product->taxedPrice);

        $this->assertEquals(10, $product->quantity);
        $this->assertEquals(100, $product->totalPrice);
        $this->assertEquals(20, $product->totalTax);
        $this->assertEquals(120, $product->totalTaxedPrice);
    }

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testCart()
    {
        $product = new Product(1);
        $product->price = 10;
        $product->taxRate = 0.2;
        $product->quantity = 1;

        $cart = new Cart();
        $cart->addProduct($product);

        $this->assertEquals(10, $cart->price);
        $this->assertEquals(2, $cart->tax);
        $this->assertEquals(12, $cart->taxedPrice);
    }

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testCartWithDiscount()
    {
        $product = new Product(1);
        $product->price = 10;
        $product->taxRate = 0.2;
        $product->quantity = 1;

        $discount = new Discount(1);
        $discount->valueType = Discount::VALUE_TYPE_AMOUNT;
        $discount->value = 1;

        $discount2 = new Discount(2);
        $discount2->valueType = Discount::VALUE_TYPE_RATE;
        $discount2->value = 0.1;

        $cart = new Cart();
        $cart->addProduct($product);
        $cart->addDiscount($discount);
        $cart->addDiscount($discount2);
        $cart->update();

        $this->assertEquals(8.1666666667, $cart->price);
        $this->assertEquals(1.6333333333, $cart->tax);
        $this->assertEquals(9.8, $cart->taxedPrice);
    }
}
