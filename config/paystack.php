<?php 
return [
    'publicKey' => env('PAYSTACK_PUBLIC_KEY'),
    'secretKey' => env('PAYSTACK_SECRET_KEY'),
    'merchantEmail' => env('PAYSTACK_MERCHANT_EMAIL'),
    'paymentUrl' => env('PAYSTACK_PAYMENT_URL', 'https://api.paystack.co'),
    'callbackUrl' => env('PAYSTACK_CALLBACK_URL'),
];
