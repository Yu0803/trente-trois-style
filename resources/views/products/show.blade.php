{{-- resources/views/products/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-6 text-center">

      {{-- 画像 --}}
      <img src="{{ asset($product['image']) }}" class="img-fluid mb-4" alt="{{ $product['name'] }}">

      {{-- 商品名・価格・説明 --}}
      <h2 class="fw-bold">{{ $product['name'] }}</h2>
      <p class="fs-4">${{ number_format($product['price'], 2) }}</p>
      <p class="mb-4">{{ $product['description'] }}</p>

      {{-- カート追加フォーム & 商品一覧に戻る --}}
      <div class="d-flex justify-content-center gap-3 flex-wrap">
        <form method="POST" action="{{ route('cart.add') }}">
          @csrf
          <input type="hidden" name="product_id" value="{{ $product['id'] }}">
          <input type="hidden" name="quantity" value="1">
          <button type="submit" class="btn-figma">cart🛒 </button>
        </form>

        <a href="{{ route('products.index') }}" class="btn-figma">
          ← products list
        </a>
      </div>

    </div>
  </div>
</div>
@endsection
