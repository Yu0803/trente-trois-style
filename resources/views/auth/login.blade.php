@extends('layouts.app')

@section('content')
<!-- Hero Section 5/21-->
<div class="hero-image d-flex flex-column justify-content-center align-items-center text-white text-center" style="background: url('/images/login-hero.jpg') center center/cover no-repeat; height: 400px;">
    {{-- <h1 style="font-size: 2.5rem; font-weight: bold;">Log In</h1> --}}
    {{-- <p style="font-size: 1.2rem;">Hi! Welcome back, you’ve been missed.</p> --}}
</div>


<div class="login-form py-5">
  <div class="text-center mb-4">
    <h2 class="fw-bold">Log In</h2>
    <p class="text-muted">Hi! Welcome back, you’ve been missed.</p>
  </div>

  <div class="row justify-content-center">
    <div class="col-md-6">
      <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                 name="email" value="{{ old('email') }}" required autofocus>
          @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                 name="password" required>
          @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3 d-flex justify-content-between align-items-center">
         <button type="submit" class="btn-figma">LOG IN</button>
 
            
          @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}">Forgot Password?</a>
          @endif
        </div>
        {{-- 👇 これを新しい行として追加 --}}
        <div class="text-center mt-5">
          <div class="d-flex align-items-center justify-content-center mb-3">
            <div style="height: 1px; background: #ccc; width: 100px;"></div>
            <span class="mx-3 text-muted">Or log in with</span>
            <div style="height: 1px; background: #ccc; width: 100px;"></div>
          </div>

          <div class="d-flex justify-content-center gap-3 fs-4">
            <a href="#"><i class="fab fa-apple text-black"></i></a>
            <a href="#"><i class="fab fa-google text-black"></i></a>
            <a href="#"><i class="fab fa-instagram text-black"></i></a>
            <a href="#"><i class="fab fa-facebook text-black"></i></a>
            <a href="#"><i class="fab fa-twitter text-black"></i></a>
          </div>
        </div>
      </form>
      <div class="text-center mt-4">
          <p class="text-sm">
          Don’t have an account?
                <a href="{{ route('register') }}" class="text-primary fw-bold text-decoration-underline">
                    Sign up
                </a>
            </p>
        </div>
    </div>
  </div>
</div>

@endsection
