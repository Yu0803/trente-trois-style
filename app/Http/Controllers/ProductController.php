<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $newArrivals = Product::latest()->take(4)->get();
        return view('partials.new_arrivals', compact('newArrivals'));
    }
}
