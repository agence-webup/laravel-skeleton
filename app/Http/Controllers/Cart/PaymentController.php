<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Repositories\OrderRepository;
use App\Values\OrderStatus;
use App\Ecommerce\Payment\PaymentInterface;
use App\Jobs\Payment\ValidateCreditCardPayment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Order repository
     * @var OrderRepository
     */
    private $orderRepo;

    public function __construct(OrderRepository $orderRepo)
    {
        $this->orderRepo = $orderRepo;
    }

    /**
     * Show payment method
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, PaymentInterface $paymentProvider)
    {
        try {
            $order = $this->getCurrentOrder($request);

            // check if the order is pending
            abort_if($order->status != OrderStatus::CREATED, 403, "Order is not in 'created' state");

        } catch (\Exception $e) {
            return redirect()->route('cart.index');
        }

        return view('payment.summary', [
            'order' => $order,
            'currencyFormat' => '%.2n',
            'stripe' => $paymentProvider->getFrontData(),
        ]);
    }

    public function validateCreditCard(Request $request, PaymentInterface $paymentProvider)
    {
        $order = $this->getCurrentOrder($request);

        // check if the order is pending
        abort_if($order->status != OrderStatus::CREATED, 403, "Order is not in 'created' state");

        $this->dispatchNow(new ValidateCreditCardPayment($order, $request->all()));

        return redirect()->route('payment.confirmation');
    }

    public function confirmation(Request $request)
    {
        $order = $this->getCurrentOrder($request);

        // send mail merci de votre commande
        return view('payment.confirmation', [
            'order' => $order,
        ]);
    }

    private function getCurrentOrder(Request $request)
    {
        $orderId = $request->session()->get('orderId', null);

        // check if an order is present
        abort_if($orderId == null, 403, "No order in current session");

        // get order
        $order = $this->orderRepo->get($orderId);

        return $order;
    }
}
