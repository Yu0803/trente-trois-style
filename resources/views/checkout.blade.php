@extends('layouts.app')

@section('content')
<div class="container py-5">
  <h2 class="text-center fw-bold mb-4">Checkout</h2>

  <!-- ✅ ユーザー登録済み情報の表示 -->
  <div class="mb-4 p-4 border rounded bg-light">
    <h5 class="mb-3">Your Information</h5>
    <p><strong>Name:</strong> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
    <p><strong>Phone:</strong> {{ Auth::user()->phone }}</p>
    <p><strong>Address:</strong> {{ Auth::user()->address1 }} {{ Auth::user()->address2 }}</p>
    <p><strong>Country:</strong> {{ Auth::user()->country ?? 'Japan' }}</p>
  </div>

  <form method="POST" action="#" id="payment-form">
    @csrf

    <!-- ✅ 配送先チェック -->
    <div class="form-check mb-4">
      <input class="form-check-input" type="checkbox" value="1" id="sameAsRegistered" checked>
      <label class="form-check-label" for="sameAsRegistered">
        Ship to my registered address
      </label>
    </div>

    <!-- ✅ 別配送先入力フォーム（デフォルト表示に変更） -->
    <div id="alternate-shipping" class="border p-4 rounded mb-4 bg-white">
      <h5 class="mb-3">Enter a different shipping address</h5>

      <div class="mb-3">
        <label class="form-label">Address 1</label>
        <input type="text" class="form-control" name="alt_address1" placeholder="123 Main St">
      </div>

      <div class="mb-3">
        <label class="form-label">Address 2</label>
        <input type="text" class="form-control" name="alt_address2" placeholder="Apartment, suite, etc.">
      </div>

      <div class="mb-3">
        <label class="form-label">Country</label>
        <select name="alt_country" class="form-select">
          <option value="Japan">Japan</option>
          <option value="USA">USA</option>
          <option value="UK">United Kingdom</option>
          <option value="France">France</option>
          <option value="Germany">Germany</option>
          <option value="Italy">Italy</option>
          <option value="Spain">Spain</option>
          <option value="Canada">Canada</option>
          <option value="Australia">Australia</option>
          <option value="New Zealand">New Zealand</option>
          <option value="India">India</option>
          <option value="Singapore">Singapore</option>
          <option value="South Korea">South Korea</option>
          <option value="China">China</option>
          <option value="Brazil">Brazil</option>
          <option value="Mexico">Mexico</option>
          <option value="Thailand">Thailand</option>
          <option value="Philippines">Philippines</option>
          <option value="Vietnam">Vietnam</option>
          <option value="Sweden">Sweden</option>
        </select>
      </div>
    </div>


    <!-- ✅ カード情報入力 -->
    <h5 class="mb-3">Payment Information</h5>

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
  // ✅ 配送先の表示切り替え
  document.getElementById('sameAsRegistered').addEventListener('change', function () {
    const altShipping = document.getElementById('alternate-shipping');
    altShipping.style.display = this.checked ? 'none' : 'block';
  });

  // ✅ 支払いボタン押下時のデモアラート
  document.getElementById('payment-form').addEventListener('submit', function(e) {
    e.preventDefault();
    alert("Your payment was successful! (This is a demo)");
    window.location.href = "/payment-success";
  });
</script>
@endpush
