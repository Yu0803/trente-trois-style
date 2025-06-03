{{-- resources/views/products/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container py-5">
  <h1 class="text-center mb-4">Product List</h1>

  <div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach ($products as $product)
      <div class="col">
        <div class="card h-100">
          <img src="{{ $product['image'] }}" class="card-img-top" alt="{{ $product['name'] }}">
          <div class="card-body text-center">
            <h5 class="card-title">{{ $product['name'] }}</h5>
            <p class="card-text">${{ number_format($product['price'], 2) }}</p>
             <a href="{{ route('products.show', $product['id']) }}" class="btn-figma">View Details</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection
