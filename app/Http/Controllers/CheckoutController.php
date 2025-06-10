<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function show()
    {
        $cart = session()->get('cart', []);
        return view('checkout', compact('cart'));
    }

    public function process(Request $request)
    {
        // ここで支払い処理をシミュレーション
        session()->forget('cart'); // カートを空にする

        return redirect()->route('checkout.success');
    }

    public function success()
    {
        return view('payment-success');
    }
}
