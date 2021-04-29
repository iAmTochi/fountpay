<?php

namespace App\Http\Controllers;

use App\Mail\PurchaseSuccessful;
use App\Transaction;
use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Stripe;
use Cart;

class CheckoutController extends Controller
{
    public function index(){
        if(Cart::content()->count() == 0){
            session()->flash('info', "Your cart is empty, do some shopping.");
            return redirect()->back();
        }
        return view('checkout');
    }

    public function pay(){


        // Set your secret key. Remember to switch to your live secret key in production.
// See your keys here: https://dashboard.stripe.com/apikeys
        Stripe::setApiKey('sk_test_51Ho5aoD7GclK75yMYBV9WvnhLjKbfS80wEIyzEE0yeAniwRNTZXMsrn0HKzfmzcbf0AThhpytJsmIcDraqLa4Tkx00p4t0MYN6');
        $token = request()->stripeToken;
        $charge = Charge::create([
            'amount' => Cart::total() * 100,
            'currency' => 'usd',
            'description' => 'Kingdom Knowledge Books',
            'source' => $token,
        ]);



        //dd($charge);
        $transaction = Transaction::create([
            'tranx_id'  => $charge->id,
            'tranx_type'    => $charge->object,
            'status'    => $charge->status,
            'amount'    => $charge->amount,
            'currency'  => $charge->currency,
            'description'   => $charge->description,
            'payment_method'    => $charge->payment_method,
            'payment_method_details' => $charge->payment_method_details
        ]);

//        $dd = json_encode($charge);
//
////        $payment = PaymentIntent::create([
////            'amount' => Cart::total() * 100,
////            'currency' => 'usd',
////            'payment_method_types' => ['card'],
////            'receipt_email' => 'jenny.rosen@example.com',
////            'description' => 'Kingdom Knowledge Books',
//////            'source' => $token,
////
////        ]);
//
//        dd($dd);

        session()->flash('success', "Payment successful, wait for our email.");

        Cart::destroy();

        Mail::to(request()->stripeEmail)->send(new PurchaseSuccessful);

        return redirect('/');
    }
}
