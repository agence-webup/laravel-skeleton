<?php

namespace App\Jobs\Order;

use App\Entities\Order;
use App\Entities\OrderProduct;
use App\Repositories\OrderRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Validation\ValidationException;
use Validator;
use DB;
use App\Ecommerce\Cart\Cart;
use App\Values\OrderStatus;

class CreateOrder implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    private $data;

    /**
     * Cart associated to this order
     * @var Cart
     */
    private $cart;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data, Cart $cart)
    {
        $this->data = $data;
        $this->cart = $cart;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(OrderRepository $orderRepo)
    {
        $validator = $this->getValidator($this->data);
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $order = DB::transaction(function () use ($orderRepo, $validator) {
            $order = new Order();
            $order->fill($validator->getData());
            $order->status = OrderStatus::CREATED;

            // price data
            $order->price = $this->cart->price;
            $order->taxedPrice = $this->cart->taxedPrice;
            $order->tax = $this->cart->tax;
            // TODO: change this after cart will be completed
            $order->shippingCost = 0;
            // $order->discount ?

            $orderRepo->save($order);

            // create order products
            foreach ($this->cart->products as $product) {
                $orderProduct = OrderProduct::createFromCartProduct($product);
                $orderProduct->order()->associate($order);
                $orderProduct->save();
            }

            return $order;
        });

        return $order;
    }

    private function getValidator(array $data)
    {
        $validator = Validator::make($data, [
            'customer_id' => 'required',
            'deliveryFirstname' => 'required',
            'deliveryLastname' => 'required',
            'deliveryEmail' => 'required',
            'deliveryPhone' => 'required',
            'deliveryAddress' => 'required',
            'deliveryAddress2' => '',
            'deliveryPostalcode' => 'required',
            'deliveryCity' => 'required',
            'billingFirstname' => 'required_if:diffAddress,1',
            'billingLastname' => 'required_if:diffAddress,1',
            'billingEmail' => 'required_if:diffAddress,1',
            'billingPhone' => 'required_if:diffAddress,1',
            'billingAddress' => 'required_if:diffAddress,1',
            'billingAddress2' => '',
            'billingPostalcode' => 'required_if:diffAddress,1',
            'billingCity' => 'required_if:diffAddress,1',
        ]);

        $validator->after(function ($validator) {
            if ($validator->errors()->count()) {
                return;
            }

            $data = $validator->getData();

            // supprime les clées qui ne sont pas validées
            foreach ($data as $key => $value) {
                if (!array_key_exists($key, $validator->getRules())) {
                    unset($data[$key]);
                }
            }

            $validator->setData($data);
        });

        return $validator;
    }
}
