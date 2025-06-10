@extends('layouts.app')

@section('content')
<div class="container py-5">
  <h2 class="text-center fw-bold mb-4">Checkout</h2>

  <form method="POST" action="{{ route('order.store') }}">
    @csrf

    <!-- Contact Info -->
    <h5 class="mb-3">Contact Details</h5>
    <div class="row mb-3">
      <div class="col-md-6">
        <label for="first_name" class="form-label">First Name</label>
        <input type="text" class="form-control" name="first_name" required>
      </div>
      <div class="col-md-6">
        <label for="last_name" class="form-label">Last Name</label>
        <input type="text" class="form-control" name="last_name" required>
      </div>
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" name="email" required>
    </div>

    <div class="mb-3">
      <label for="phone" class="form-label">Phone Number</label>
      <input type="tel" class="form-control" name="phone">
    </div>

    <!-- Shipping Info -->
    <h5 class="mb-3">Shipping Details</h5>
    <div class="mb-3">
      <label for="address1" class="form-label">Address 1</label>
      <input type="text" class="form-control" name="address1" required>
    </div>

    <div class="mb-3">
      <label for="address2" class="form-label">Address 2 (Optional)</label>
      <input type="text" class="form-control" name="address2">
    </div>

    <div class="row mb-3">
      <div class="col-md-6">
        <label for="postal_code" class="form-label">Postal Code</label>
        <input type="text" class="form-control" name="postal_code">
      </div>
      <div class="col-md-6">
        <label for="country" class="form-label">Country</label>
        <select class="form-select" name="country" required>
          <option value="Japan">Japan</option>
          <option value="USA">USA</option>
          <!-- 他にも追加可能 -->
        </select>
      </div>
    </div>

    <!-- Order Items hidden inputs -->
    @php
      $cart = session('cart', []);
      $index = 0;
    @endphp

    @foreach ($cart as $item)
      <input type="hidden" name="items[{{ $index }}][product_id]" value="{{ $item['product_id'] }}">
      <input type="hidden" name="items[{{ $index }}][quantity]" value="{{ $item['quantity'] }}">
      @php $index++; @endphp
    @endforeach

    <div class="text-center mt-4">
      <button type="submit" class="btn-figma">Pay & Place Order</button>
    </div>
  </form>
</div>
@endsection
