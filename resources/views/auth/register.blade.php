@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="hero-image d-flex flex-column justify-content-center align-items-center text-white text-center container-wide"
     style="background: url('/images/login-hero.jpg') center center/cover no-repeat; height: 400px;">
</div>

<!-- Register Form -->
<div class="container py-5 container-wide">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="text-center mb-4">
                <h2 class="fw-bold">Create Account</h2>
                <p class="text-muted">Fill your information below or register with your social account.</p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="first_name" class="form-label">First Name</label>
                        <input id="first_name" type="text" class="form-control" name="first_name" required>
                    </div>
                    <div class="col-md-6">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input id="last_name" type="text" class="form-control" name="last_name" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" type="email" class="form-control" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" type="password" class="form-control" name="password" required>
                </div>

                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="country_code" class="form-label">Country Code</label>
                        <select id="country_code" class="form-select">
                            <option value="+81" selected>+81</option>
                            <!-- 他の国コードも追加可 -->
                        </select>
                    </div>
                    <div class="col-md-10">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input id="phone" type="text" class="form-control" name="phone">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="dob" class="form-label">Birth of date</label>
                    <input id="dob" type="date" class="form-control" name="dob">
                </div>

                <div class="mb-3">
                    <label for="address1" class="form-label">Address1</label>
                    <input id="address1" type="text" class="form-control" name="address1">
                </div>

                <div class="mb-3">
                    <label for="address2" class="form-label">Address2</label>
                    <input id="address2" type="text" class="form-control" name="address2">
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="postal_code" class="form-label">Postal Code</label>
                        <input id="postal_code" type="text" class="form-control" name="postal_code">
                    </div>
                    <div class="col-md-6">
                        <label for="country" class="form-label">Country</label>
                        <select id="country" name="country" class="form-select">
                            <option value="Japan">Japan</option>
                            <option value="USA">USA</option>
                            <!-- 必要に応じて追加 -->
                        </select>
                    </div>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" name="terms" id="terms" required>
                    <label class="form-check-label" for="terms">Agree with <a href="#">Terms & Condition</a></label>
                </div>

                <button type="submit" class="btn-figma w-50 mx-auto d-block">
                Sign Up
                </button>


                <div class="text-center">
                    <div class="d-flex justify-content-center align-items-center mb-3">
                        <div style="height: 1px; background: #ccc; width: 100px;"></div>
                        <span class="mx-3 text-primary">Or sign up with</span>
                        <div style="height: 1px; background: #ccc; width: 100px;"></div>
                    </div>
                    <div class="d-flex justify-content-center gap-3 fs-4">
                        <i class="fab fa-apple"></i>
                        <i class="fab fa-google"></i>
                        <i class="fab fa-instagram"></i>
                        <i class="fab fa-facebook"></i>
                        <i class="fab fa-twitter"></i>
                    </div>
                </div>
               
<div class="text-center mt-4">
    <p class="text-muted">Already have an account? <a href="{{ route('login') }}" class="text-primary">Log in</a></p>
</div>

            </form>
        </div>
    </div>
</div>
@endsection
