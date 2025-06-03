{{-- resources/views/products/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-6 text-center">
      {{-- 画像 --}}
      <img src="{{ asset($product['image']) }}" class="img-fluid mb-4" alt="{{ $product['name'] }}">

      {{-- 商品名・価格・説明 --}}
      <h2>{{ $product['name'] }}</h2>
      <p class="fs-4">${{ number_format($product['price'], 2) }}</p>
      <p>{{ $product['description'] }}</p>

      {{-- カート追加フォーム --}}
      <form method="POST" action="{{ route('cart.add') }}" class="d-inline-block mt-3 me-3">
          @csrf
          <input type="hidden" name="product_id" value="{{ $product['id'] }}">
          <input type="hidden" name="quantity" value="1">

          <button type="submit" class="btn-figma">
              🛒 Add to Cart
          </button>
      </form>

      {{-- 商品一覧に戻る --}}
      <a href="{{ route('products.index') }}" class="btn- mt-3">
          ← Return to product list
      </a>
    </div>
  </div>
</div>
@endsection
