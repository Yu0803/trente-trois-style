@extends('layouts.app')

@section('content')
<div class="container py-5">
  <h1 class="fw-bold mb-4">Returns & Refund Policy</h1>

  {{-- 動画を表示（MP4） --}}
  <div class="text-center mb-5">
    <video controls autoplay muted loop style="max-width: 100%; border-radius: 10px;">
      <source src="{{ asset('videos/return-policy.mp4') }}" type="video/mp4">
      Your browser does not support the video tag.
    </video>
  </div>

  {{-- テキストポリシー --}}
  <h4 class="fw-semibold">30 Days Return</h4>
  <p>Simply return the item within 30 days of purchase for an exchange or refund. Items must be in good condition.</p>

  <h4 class="fw-semibold mt-4">Free Returns</h4>
  <p>We offer free returns on all eligible items using our pre-paid return label.</p>

  <h4 class="fw-semibold mt-4">Return Process</h4>
  <p>Contact our support team with your order number. We’ll send you instructions and a pre-paid return label via email.</p>

  <h4 class="fw-semibold mt-4">International Orders</h4>
  <p>International returns will be issued as store credit or a gift card. Final sale items cannot be returned.</p>

  <h4 class="fw-semibold mt-4">Refund Timeline</h4>
  <p>Refunds are processed within 5–10 business days after we receive your returned item.</p>
</div>
@endsection
