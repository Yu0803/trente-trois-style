@extends('layouts.app')

@section('content')
<div class="contact-form py-5 container-wide">
  <h2 class="text-center mb-4">Contact Us</h2>

  @if(session('success'))
    <div class="alert alert-success text-center">{{ session('success') }}</div>
  @endif
<div class="row justify-content-center">
    <div class="col-ld-6">
  <form method="POST" action="{{ route('contact.submit') }}">
    @csrf

    <div>
      <label class="form-label">Your Name</label>
      <input type="text" name="name" class="form-control" required>
    </div>

    <div>
      <label class="form-label">Email Address</label>
      <input type="email" name="email" class="form-control" required>
    </div>
 
      <label class="form-label">Message</label>
      <textarea name="message" rows="5" class="form-control" required></textarea>
    </div>

    <div class="text-center">
      <button type="submit" class="btn-figma mx-auto d-block">Send Message</button>
    </div>
  </form>
</div>
@endsection
