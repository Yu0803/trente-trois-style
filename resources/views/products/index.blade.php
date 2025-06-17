{{-- resources/views/products/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container py-5">
  <h1 class="text-center mb-4">Product List</h1>

  <div class="row g-5 row-cols-1 row-cols-md-3 h-100">
    @foreach ($products as $product)
      <div class="col-4">
        <div class="card">
          <img src="{{ asset($product->image) }}"
          class="rounded img-fluid"
          alt="{{ $product->name }}">
          {{-- 商品画像 --}}
          {{-- 画像の高さを350pxに固定し、object-fitで切り抜き --}} 

          
          <div class="card-body text-center">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text">${{ number_format($product->price) }}</p>
            <a href="{{ route('products.show', $product->id) }}" class="btn-figma">View Details</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>

  {{-- ✅ ページネーションリンク --}}
  <div class="d-flex justify-content-center mt-4">
    {{ $products->links('vendor.pagination.custom') }}
  </div>

  {{-- ✅ カテゴリ切り替えリンクバー --}}
  <div class="d-flex justify-content-center mt-4 mb-5">
    <a href="{{ route('products.index', ['category' => 'Dress']) }}" class="btn btn-figma rounded-pill mx-2">Dresses</a>
    <a href="{{ route('products.index', ['category' => 'Accessories']) }}" class="btn btn-figma rounded-pill mx-2">Accessories</a>
    <a href="{{ route('products.index', ['category' => 'Bag']) }}" class="btn btn-figma rounded-pill mx-2">Bags</a>
  </div>
</div>
@endsection
