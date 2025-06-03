<?php

// app/Http/Controllers/ProductController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = [
            ['id' => 1, 'name' => 'Coral Dress', 'price' => 6800, 'image' => '/images/dress1.jpg'],
            ['id' => 2, 'name' => 'Green Dress', 'price' => 5400, 'image' => '/images/dress2.jpg'],
            ['id' => 3, 'name' => 'Blue Dress', 'price' => 5800, 'image' => '/images/dress3.jpg'],
            ['id' => 4, 'name' => 'Purple Dress', 'price' => 5000, 'image' => '/images/dress4.jpg'],
            ['id' => 5, 'name' => 'Green Tea Dress', 'price' => 6200, 'image' => '/images/dress5.jpg'],
            ['id' => 6, 'name' => 'White Dress', 'price' => 6200, 'image' => '/images/dress6.jpg'],
            ['id' => 7, 'name' => 'Pink  Dress', 'price' => 6800, 'image' => '/images/dress7.jpg'],
            ['id' => 8, 'name' => 'Dark Green Dress', 'price' => 5400, 'image' => '/images/dress8.jpg'],
            ['id' => 9, 'name' => 'Sky Blue Dress', 'price' => 5800, 'image' => '/images/dress9.jpg'],
            ['id' => 10, 'name' => 'Ocean Mist  Dress', 'price' => 5000, 'image' => '/images/dress10.jpg'],
            ['id' => 11, 'name' => 'Red Dress', 'price' => 6200, 'image' => '/images/dress11.jpg'],
            ['id' => 12, 'name' => 'Orange Dress', 'price' => 6200, 'image' => '/images/dress12.jpg'],
        ];

        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $products = [
            ['id' => 1, 'name' => 'Coral  Dress', 'price' => 6800, 'image' => '/images/dress1.jpg', 'description' => 'Elegant pink dress for weddings.'],
            ['id' => 2, 'name' => 'Green Dress', 'price' => 5400, 'image' => '/images/dress2.jpg', 'description' => 'Stylish green gown with lace.'],
            ['id' => 3, 'name' => 'Blue Dress', 'price' => 5800, 'image' => '/images/dress3.jpg', 'description' => 'Classic blue dress with tulle.'],
            ['id' => 4, 'name' => 'Purple Dress', 'price' => 5000, 'image' => '/images/dress4.jpg', 'description' => 'Flowy and dreamy purple gown for special events.'],
            ['id' => 5, 'name' => 'Green Tea Dress', 'price' => 6200, 'image' => '/images/dress5.jpg', 'description' => 'Chic Green Tea dress, perfect for celebrations.'],
            ['id' => 6, 'name' => 'White Dress', 'price' => 6200, 'image' => '/images/dress6.jpg', 'description' => 'Chic white dress, perfect for celebrations.'],
            ['id' => 7, 'name' => ' Pink Dress', 'price' => 6800, 'image' => '/images/dress7.jpg', 'description' => 'Elegant pink dress for weddings.'],
            ['id' => 8, 'name' => 'Dark Green Dress', 'price' => 5400, 'image' => '/images/dress8.jpg', 'description' => 'Stylish green gown with lace.'],
            ['id' => 9, 'name' => 'Sky Blue Dress', 'price' => 5800, 'image' => '/images/dress9.jpg', 'description' => 'Classic blue dress with tulle.'],
            ['id' => 10, 'name' => 'Ocean Mist  Dress', 'price' => 5000, 'image' => '/images/dress10.jpg', 'description' => 'Flowy and dreamy purple gown for special events.'],
            ['id' => 11, 'name' => 'Red Dress', 'price' => 6200, 'image' => '/images/dress11.jpg', 'description' => 'Chic Red dress, perfect for celebrations.'],
            ['id' => 12, 'name' => 'Orange Dress', 'price' => 6200, 'image' => '/images/dress12.jpg', 'description' => 'Chic Orange dress, perfect for celebrations.'],
        ];

        $product = collect($products)->firstWhere('id', $id);

        if (!$product) {
            abort(404);
        }

        return view('products.show', compact('product'));
    }
}

