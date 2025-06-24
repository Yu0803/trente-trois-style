@extends('layouts.app')

@section('content')
<div class="container py-5">
  <h1 class="fw-bold mb-4">Latest Posts</h1>
  <p>Here you'll find a list of our latest posts.</p>

  {{-- Blog Section --}}
  <div class="row g-4 mt-4">
    
    {{-- Blog 1: 動画付き --}}
    <div class="col-md-4">
      <div class="card h-100">
        <video class="card-img-top" controls>
          <source src="{{ asset('videos/wedding_dress1.mp4') }}" type="video/mp4">
          Your browser does not support the video tag.
        </video>
        <div class="card-body">
          <h5 class="card-title">New Dresses Just Arrived</h5>
          <p class="card-text">Explore our latest wedding dress collection — elegance meets modern beauty.</p>
          <a href="#" class="btn btn-figma">Read More</a>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection
