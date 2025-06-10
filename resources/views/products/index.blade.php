{{-- resources/views/products/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container py-5">
  <h1 class="text-center mb-4">Product List</h1>

  <div class="row g-5 row-cols-1 row-cols-md-3">
    @foreach ($products as $product)
      <div class="col-4 ">
          <div class="card ">
          <img src="{{ asset($product->image) }}"
          class="rounded img-fluid"
          alt="{{ $product->name }}"
          >
          {{-- 商品名・価格 --}}
          <div class="card-body text-center">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text">¥{{ number_format($product->price) }}</p>
            <a href="{{ route('products.show', $product->id) }}" class="btn-figma">View Details</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection
