@extends('layouts.app')

@section('content')
<div class="container py-5">
  <h1 class="fw-bold mb-4">Shipping Info</h1>

  <p>
    We offer a variety of shipping methods to meet your needs, including standard, express, and international delivery. 
    Shipping fees are calculated based on your location and order total. 
    Once your order is placed, you’ll receive an estimated delivery date and tracking number via email. 
    For more details on shipping times, costs, and carriers, please see the information below.
  </p>

  <div class="d-flex justify-content-center my-4">
    <video width="70%" autoplay loop muted playsinline>
      <source src="{{ asset('videos/shipping-info.mp4') }}" type="video/mp4">
      Your browser does not support the video tag.
    </video>
  </div>
</div>
@endsection
