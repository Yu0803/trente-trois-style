@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<div class="hero-image d-flex flex-column justify-content-center align-items-center text-white text-center container-wide" style="background: url('/images/login-hero.jpg') center center/cover no-repeat; height: 400px;">
    <h1 class="display-4 fw-bold">PAYMENT</h1>
</div>

<!-- Thank you Section -->
<div class="container my-5 payment-summary">
    <h2 class="text-center fw-bold mb-4">Thank you</h2>

    <!-- 商品リスト -->
    <div class="row mb-4">
        <div class="col-md-2">
            <img src="/images/dress.jpg" alt="Dress" class="img-fluid">
        </div>
        <div class="col-md-6 d-flex align-items-center">
            <span>Fabulous Dress</span>
        </div>
        <div class="col-md-2 d-flex align-items-center justify-content-center">
            <span>1</span>
        </div>
        <div class="col-md-2 d-flex align-items-center justify-content-end">
            <span>$400.00</span>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-2">
            <img src="/images/earrings.jpg" alt="Earrings" class="img-fluid">
        </div>
        <div class="col-md-6 d-flex align-items-center">
            <span>Diamond Earrings</span>
        </div>
        <div class="col-md-2 d-flex align-items-center justify-content-center">
            <span>1</span>
        </div>
        <div class="col-md-2 d-flex align-items-center justify-content-end">
            <span>$400.00</span>
        </div>
    </div>

    <!-- 合計 -->
    <div class="row justify-content-end">
        <div class="col-md-4">
            <table class="table">
                <tr>
                    <td>Subtotal</td>
                    <td class="text-end">$800.00</td>
                </tr>
                <tr>
                    <td>Sales Tax (10%)</td>
                    <td class="text-end">$80.00</td>
                </tr>
                <tr>
                    <td>Shipping Fee</td>
                    <td class="text-end text-success">FREE</td>
                </tr>
                <tr>
                    <th>Total Due</th>
                    <th class="text-end text-primary">$880.00</th>
                </tr>
            </table>
        </div>
    </div>
</div>

@endsection
