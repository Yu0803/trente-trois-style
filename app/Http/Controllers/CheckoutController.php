<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function show()
    {
        $cart = session()->get('cart', []);
        $total = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        return view('checkout', compact('cart'));
    }

    public function process(Request $request)
    {
        session()->forget('cart');
        return redirect()->route('checkout.success');
    }

    public function success()
    {
        return view('payment-success');
    }
}
