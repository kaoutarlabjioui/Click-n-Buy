<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;
use Stripe\Charge;

class PaymentController extends Controller
{

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */

    public function pay(Request $request){
        $totalApaye =$request['totalAmont'];
        $tax = 99;
        $livraison = 'Gratuite';
        $finalApaye = $totalApaye + $tax;
     
        return view('client.payment', compact('totalApaye', 'tax', 'finalApaye', 'livraison'));
    }


    public function processPayment(Request $request)

    {

        Stripe\Stripe::setApiKey(config('stripe.secret'));

        try {
            Stripe\Charge::create([
                'amount' => $request['balance'] * 100, // Amount in cents
                'currency' => 'usd',
                'source' => $request->stripeToken,
                'description' => '',
            ]);

            // Payment successful; store a success message in the session
            // $request->session()->flash('success', 'Payment successful!');

            return view('client.success');
            echo "<script>localStorage.clear();</script>";
            return  view('client.success');
        } catch (Stripe\Exception\CardException $e) {
            echo $e->getMessage();
        }
    }
}


