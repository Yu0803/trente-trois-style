@extends('layouts.app')

@section('content')
<div class="container py-5">

  <h1 class="fw-bold mb-4">Delivery</h1>

  <!-- 画像 -->
  <div class="text-center mb-4">
    <img src="{{ asset('images/shipping-banner.png') }}" alt="Free Shipping Offer" class="img-fluid" style="max-width: 500px;">
  </div>

  <!-- 詳細説明 -->
  <p class="mb-3">
    We offer both standard and express delivery services to ensure your order reaches you in the most convenient way possible. 
    Standard shipping typically takes 5–7 business days, while express delivery ensures your package arrives within 2–3 business days.
  </p>
  <p class="mb-3">
    Orders over <strong>$100</strong> qualify for <strong>free standard shipping</strong>. Simply use the code 
    <span class="fw-bold text-primary">FREESHIPPING123</span> at checkout to enjoy this offer.
  </p>
  <p>
    Please note that delivery times may vary depending on your location and any unexpected delays due to weather or high demand.
    For more detailed shipping policies, visit <a href="{{ url('/terms-of-use') }}" target="_blank">our Terms of Use</a>.
  </p>

</div>
@endsection
