<?php

// app/Http/Controllers/CartController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        $cart = session()->get('cart', []);
        $id = $product->id;
        $quantity = $request->quantity;

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            $cart[$id] = [
                'product_id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => $quantity,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart')->with('success', 'Added to cart!');
    }


    public function update(Request $request)
    {
        $productId = $request->input('product_id');
        $action = $request->input('action'); // 'increase' または 'decrease'
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            if ($action === 'increase') {
                $cart[$productId]['quantity']++;
            } elseif ($action === 'decrease') {
                $cart[$productId]['quantity']--;
                if ($cart[$productId]['quantity'] <= 0) {
                    unset($cart[$productId]); // 数量が0以下になったら削除
                }
            }
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Cart updated successfully!');
    }

    
    public function remove(Request $request)
    {
        $productId = $request->input('product_id');
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product removed from cart!');
    }

    public function show()
    {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }
}
