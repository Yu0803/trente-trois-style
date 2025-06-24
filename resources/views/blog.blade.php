@extends('layouts.app')

@section('content')
<div class="container py-5">
  <h1 class="fw-bold mb-4">Blog</h1>
  <p>Here you'll find a list of blog posts and articles.</p>

  <div class="row g-4">

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

    {{-- Blog 2: 動画付き --}}
    <div class="col-md-4">
      <div class="card h-100">
        <video class="card-img-top" controls>
          <source src="{{ asset('videos/wedding_day.mp4') }}" type="video/mp4">
          Your browser does not support the video tag.
        </video>
        <div class="card-body">
          <h5 class="card-title">My Wedding Day</h5>
          <p class="card-text">A beautiful moment captured with love, flowers, and heartfelt promises.</p>
          <a href="#" class="btn btn-figma">Read More</a>
        </div>
      </div>
    </div>

    {{-- Blog 3: 画像付き --}}
    <div class="col-md-4">
      <div class="card h-100">
        <video class="card-img-top" controls>
          <source src="{{ asset('videos/wedding_mini_session.mp4') }}" type="video/mp4">
          Your browser does not support the video tag.
        </video>
          <div class="card-body">
            <h5 class="card-title">Wedding Mini Session</h5>
            <p class="card-text">
              1-hour photo shoot featuring 100 beautifully edited images, an online gallery, and a personalized consultation.
            </p>
            <a href="#" class="btn btn-figma">Read More</a>
          </div>
      </div>
    </div>


  </div>
</div>
@endsection
