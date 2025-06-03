<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class TopPageController extends Controller
{
    public function index()
    {
        $newArrivals = Product::where('category', 'new')->take(8)->get();
        $topSellers = Product::where('category', 'top')->take(5)->get();

        return view('top', compact('newArrivals', 'topSellers'));
    }
}