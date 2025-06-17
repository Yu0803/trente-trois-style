@extends('layouts.app')

@section('content')
<div class="container py-5">
  <h2 class="text-center fw-bold mb-4">Checkout</h2>

  <form method="POST" action="#" id="payment-form">
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
    <!-- Phone Number with Country Code -->
    <div class="mb-3">
      <label class="form-label">Phone Number</label>
      <div class="input-group">
        <span class="input-group-text" id="country-code">+81</span>
        <input type="tel" class="form-control" name="phone" placeholder="90-1234-5678" aria-describedby="country-code">
      </div>
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

    <div class="mb-3">
        <label for="country" class="form-label">Country</label>
        <select id="country-select" class="form-select">
          <option value="JP" data-code="+81">Japan</option>
          <option value="US" data-code="+1">USA</option>
          <option value="UK" data-code="+44">UK</option>
          <option value="FR" data-code="+33">France</option>
        </select>
    </div>

   
    <!-- Dummy Credit Card Info -->
    <h5 class="mb-3">Payment (Demo Only)</h5>
    <div class="mb-3">
      <label class="form-label">Card Number</label>
      <input type="text" class="form-control" placeholder="4242 4242 4242 4242 (Demo)">
    </div>
    <div class="row mb-3">
      <div class="col-md-6">
        <label class="form-label">Expiration</label>
        <input type="text" class="form-control" placeholder="12/34">
      </div>
      <div class="col-md-6">
        <label class="form-label">CVC</label>
        <input type="text" class="form-control" placeholder="123">
      </div>
    </div>

    <div class="alert alert-info">
      ※ This payment form is for portfolio demonstration purposes only. No actual payment will be processed.
    </div>

    <div class="text-center mt-4">
      <button type="submit" class="btn-figma">Pay & Place Order</button>
    </div>
  </form>
</div>
@endsection

@push('scripts')
<script>
  // 国を選ぶと自動で国番号を変えるスクリプト
  document.getElementById('country-select').addEventListener('change', function () {
    const selected = this.options[this.selectedIndex];
    const code = selected.getAttribute('data-code');
    document.getElementById('country-code').textContent = code;
  });

  // 支払いボタン押下時のデモアラート
  document.getElementById('payment-form').addEventListener('submit', function(e) {
    e.preventDefault();
    alert("Your payment was successful! (This is a demo)");
    window.location.href = "/payment-success";
  });
</script>
@endpush
