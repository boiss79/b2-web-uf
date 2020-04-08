<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mollie\Laravel\Facades\Mollie;

class PaymentController extends Controller
{
    public function prepare() {
        $payment = Mollie::api()->payments()->create([
        'amount' => [
            'currency' => 'EUR',
            'value' => '10.00', // You must send the correct number of decimals, thus we enforce the use of strings
        ],
        'description' => 'My first API payment',
        'redirectUrl' => route('payment.success'),
        ]);

        $payment = Mollie::api()->payments()->get($payment->id);

        // redirect customer to Mollie checkout page
        return redirect($payment->getCheckoutUrl(), 303);
    }

    public function success() {
        echo 'payment success';
    }
}
