<?php

namespace App\Http\Controllers;

use App\Models\UserSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use PayPal\Api\Payer;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Unicodeveloper\Paystack\Facades\Paystack;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaymentController extends Controller
{
    // private $_api_context;
    // public function __construct() {
    //     $paypal = config('paypal');
    //     $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal['client_id'], $paypal['secret']));
    //     $this->_api_context->setConfig($paypal['settings']);
    // }

    public function processPayment(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'payment_method' => 'required',
        ]);

        // Store user subscription before making payment
        UserSubscription::create([
            'user_subscription_id' => Str::uuid(),
            'user_id' => Auth::user()->id,
            'plan_id' => $request->plan,
            'payment_method' => $request->payment_method,
        ]);

        $paymentMethod = $request->payment_method;

        if ($paymentMethod === 'stripe') {
            return $this->processStripePayment($request);
        } elseif ($paymentMethod === 'paystack') {
            return $this->processPaystackPayment($request);
        } elseif ($paymentMethod === 'paypal') {
            return $this->processPaypalPayment($request);
        } else {
            return back()->with('error', 'Invalid payment method selected.');
        }
    }

    private function processPaystackPayment(Request $request)
    {
        try {
            $paymentData = [
                "amount" => 10000, // Amount in Kobo (100 NGN)
                "email" => Auth::user()->email,
                "currency" => "NGN",
                "reference" => Paystack::genTranxRef(),
                "callback_url" => route('payment.paystack.callback')
            ];

            return Paystack::getAuthorizationUrl($paymentData)->redirectNow();
        } catch (\Exception $e) {
            return back()->with('error', 'Paystack payment failed: ' . $e->getMessage());
        }
    }

    public function paystackCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        if ($paymentDetails['status'] === 'success') {
            return redirect()->route('home')->with('success', 'Paystack payment successful!');
        }

        return redirect()->route('home')->with('error', 'Paystack payment failed!');
    }

    // public function processPaymentWithPaypal(Request $request) {
    //     $payer = new Payer();
    //     $payer->setPaymentMethod()
    // }



    private function processPaypalPayment(Request $request)
    {
        $paypal = new PayPalClient;
        // $paypal->setApiCredentials(config('paypal.php'));
        $paypalToken = $paypal->getAccessToken();
    
        $response = $paypal->createOrder([
            "intent" => "CAPTURE",
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => config('paypal.currency'),
                        "value" => "100.00"
                    ]
                ]
            ]
        ]);
    
        if (isset($response['id']) && $response['status'] == "CREATED") {
            foreach ($response['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    return redirect()->away($link['href']);  // ✅ Redirects user to PayPal
                }
            }
        }
    
        return back()->with('error', 'PayPal payment failed.');
    }
    

    public function paypalCallback(Request $request)
    {
        $paypal = new PayPalClient;
        $paypal->setApiCredentials(config('paypal'));
        $response = $paypal->capturePaymentOrder($request->token);

        if (isset($response['status']) && $response['status'] == "COMPLETED") {
            return redirect()->route('home')->with('success', 'PayPal payment successful!');
        }

        return redirect()->route('home')->with('error', 'PayPal payment failed.');
    }
}
