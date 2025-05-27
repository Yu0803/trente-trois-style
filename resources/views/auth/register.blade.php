@extends('layouts.app')

@section('content')
<div class="hero-image d-flex flex-column justify-content-center align-items-center text-white text-center"
     style="background: url('/images/login-hero.jpg') center center/cover no-repeat; height: 400px;">
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                    <div class="text-center mt-3">
                        <h2 class="fw-bold">Create Account</h2>
                        <p class="text-muted">Fill your information below or register with your social account.</p>
                    </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="first_name" class="col-md-4 col-form-label text-md-end">First Name</label>
                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control" name="first_name" required>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="terms" required>
                                        <label class="form-check-label">
                                            Agree with <a href="#" class="text-decoration-underline">Terms & Conditions</a>
                                        </label>
                                    </div>
                                </div>
                            </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>

                    <div class="text-center mt-4">
                    <div class="d-flex justify-content-center align-items-center mb-3">
                        <div style="height: 1px; background: #ccc; width: 100px;"></div>
                        <span class="mx-3 text-muted">Or sign up with</span>
                        <div style="height: 1px; background: #ccc; width: 100px;"></div>
                    </div>
                    <div class="d-flex justify-content-center gap-3 fs-4">
                        <i class="fab fa-apple"></i>
                        <i class="fab fa-google"></i>
                        <i class="fab fa-facebook"></i>
                        <i class="fab fa-twitter"></i>
                    </div>

                    <p class="mt-4">
                        Already have an account?
                        <a href="{{ route('login') }}" class="text-primary text-decoration-underline">Log in</a>
                    </p>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
