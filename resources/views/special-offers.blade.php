@extends('layouts.app')

@section('content')
<div class="container py-5">
  <h1 class="fw-bold mb-4">Special Offers</h1>
  <p>Discover our latest promotions, discounts, and exclusive deals.</p>

  {{-- 動画をここに表示 --}}
  <div class="my-4">
    <video class="w-100 rounded" controls>
      <source src="{{ asset('videos/special_offer.mp4') }}" type="video/mp4">
      Your browser does not support the video tag.
    </video>
  </div>
</div>
@endsection
