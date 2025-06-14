@extends('layouts.app')

@section('content')
<div class="container py-5">
  <h2 class="mb-4 fw-bold">Shopping Cart</h2>

  @php
      $cart = session('cart', []);
  @endphp

  @if(count($cart) > 0)
    <table class="table table-bordered align-middle text-center">
      <thead class="table-light">
        <tr>
          <th>Product</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>Subtotal</th>
          <th>Action</th> {{-- 追加: アクション列の見出し --}}
        </tr>
      </thead>
      <tbody>
        @php $total = 0; @endphp
        @foreach ($cart as $item)
          @php
            $subtotal = $item['price'] * $item['quantity'];
            $total += $subtotal;
          @endphp
          <tr>
            <td>{{ $item['name'] ?? 'Unknown Product' }}</td>
            <td>
              {{-- 数量変更フォーム --}}
              <form action="{{ route('cart.update') }}" method="POST" class="d-inline-flex align-items-center">
                @csrf
                <input type="hidden" name="product_id" value="{{ $item['product_id'] }}">
                <button type="submit" name="action" value="decrease" class="btn btn-sm btn-outline-secondary me-1">-</button>
                <input type="text" name="quantity" value="{{ $item['quantity'] }}" class="form-control form-control-sm text-center" style="width: 50px;" readonly>
                <button type="submit" name="action" value="increase" class="btn btn-sm btn-outline-secondary ms-1">+</button>
              </form>
            </td>
            <td>${{ number_format($item['price']) }}</td>
            <td>${{ number_format($subtotal) }}</td>
            <td>
              {{-- 削除ボタン --}}
              <form action="{{ route('cart.remove') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $item['product_id'] }}">
                <button type="submit" class="btn btn-sm btn-danger">
                  <i class="fas fa-trash-alt"></i> {{-- ゴミ箱アイコンを追加 --}}
                  {{-- Remove --}} {{-- テキストを非表示にする場合はコメントアウトまたは削除 --}}
                </button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <div class="text-end my-3 fw-bold">
      Total: ${{ number_format($total) }}
    </div>


    <div class="text-end">
      {{-- ここに「Continue Shopping」ボタンを追加します --}}
      <a href="{{ route('products.index') }}" class="btn-figma mt-3 rounded-pill me-2">Continue Shopping</a>
      <a href="{{ route('checkout.show') }}" class="btn-figma mt-3 rounded-pill">Proceed to Checkout</a>
    </div>

  @else
    <p>Your cart is currently empty.</p>
    {{-- カートが空の場合も「Continue Shopping」ボタンを表示 --}}
    <div class="text-start">
        <a href="{{ route('products.index') }}" class="btn-figma mt-3 rounded-pill">Continue Shopping</a>
    </div>
  @endif
</div>
@endsection