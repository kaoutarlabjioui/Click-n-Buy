<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;

class PaymentController extends Controller
{
    public function showPaymentForm()
    {
        return view('payment');
    }


    public function pay(Request $request){
        $totalApaye =$request['totalAmont'];
        $tax = 99;
        $finalApaye = $totalApaye + $tax;
    }


    public function processPayment(Request $request)

    {

        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            Charge::create([
                'amount' => $request['balance'] * 100, // Amount in cents
                'currency' => 'usd',
                'source' => $request->stripeToken,
                'description' => 'Test Payment',
            ]);
            dd($request);

            // Payment successful; store a success message in the session
            $request->session()->flash('success', 'Payment successful!');

            return redirect()->route('payment.success');
        } catch (\Exception $e) {
            // Payment failed; store an error message in the session
            $request->session()->flash('error', $e->getMessage());

            return redirect()->route('payment.failure');
        }
    }
}


