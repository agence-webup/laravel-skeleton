<?php

namespace Webup\Ecommerce\PaymentProvider\Stripe;

use App\Ecommerce\Payment\PaymentResult;
use App\Ecommerce\Payment\PaymentInterface;
use App\Ecommerce\Order\OrderInterface;
use Illuminate\Http\Request;

/**
 * Stripe payment manager
 */
class StripePayment implements PaymentInterface
{
    protected $config;

    public function __construct($config)
    {
        $this->config = $config;
        $this->checkConfig();

        // Set your secret key: remember to change this to your live secret key in production
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey($this->config['secret_key']);
    }

    public function getFrontData()
    {
        return [
            'checkout_url' => $this->config['urls']['checkout'],
            'publishable_key' => $this->config['publishable_key'],
        ];
    }

    public function validatePayment(OrderInterface $order, array $requestData)
    {
        // Get the credit card details submitted by the form
        if (!array_key_exists('stripeToken', $requestData)) {
            throw new \Exception("Request data must contain 'stripeToken' key with the Stripe generated token as value", 1);
        }
        $token = $requestData['stripeToken'];

        $result = new PaymentResult();

        // Create a charge: this will charge the user's card
        try {
            $charge = \Stripe\Charge::create([
                "amount" => $order->getAmountForPayment(), // Amount in cents
                "currency" => $this->config['currency'],
                "source" => $token,
                "description" => $order->getDescription(),
            ]);

            $result->success = true;
            $result->message = $charge->outcome->seller_message;
            $result->rawResponse = $charge->jsonSerialize();
            $result->timestamp = time();
        } catch (\Stripe\Error\Card $e) {
            $result->success = false;
            $result->message = $e->getMessage();
            $result->rawResponse = $e->getJsonBody();
            $result->timestamp = time();
        }

        return $result;
    }

    private function checkConfig()
    {
        if ($this->config['publishable_key'] == null || $this->config['secret_key'] == null) {
            throw new \Exception("STRIPE_KEY or STRIPE_SECRET environment variables are missing", 1);
        }
    }
}
