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
            <td>{{ $item['quantity'] }}</td>
            <td>${{ number_format($item['price']) }}</td>
            <td>${{ number_format($subtotal) }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <div class="text-end my-3 fw-bold">
      Total: ${{ number_format($total) }}
    </div>

    <div class="text-end">
      <a href="{{ route('checkout') }}" class="btn btn-primary">Proceed to Checkout</a>
    </div>

  @else
    <p>Your cart is currently empty.</p>
  @endif
</div>
@endsection
