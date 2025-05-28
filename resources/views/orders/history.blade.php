@extends('layouts.app')

@section('content')
<!-- Hero Section 5/21-->
<div class="hero-image d-flex flex-column justify-content-center align-items-center text-white text-center" style="background: url('/images/login-hero.jpg') center center/cover no-repeat; height: 400px;">
    {{-- <h1 style="font-size: 2.5rem; font-weight: bold;">Log In</h1> --}}
    {{-- <p style="font-size: 1.2rem;">Hi! Welcome back, you’ve been missed.</p> --}}
</div>
<div class="container py-5">
    <h1 class="text-center mb-4">Order History</h1>
    <p class="text-center">Orders Count: {{ $orders->count() }}</p> 

@foreach ($orders as $order)
    <h3>Order #{{ $order->id }} ({{ $order->status }})</h3>
    <ul>
        @foreach ($order->products as $product)
            <li>
                {{ $product->name }} - ${{ $product->price }}
            </li>
        @endforeach
    </ul>

    {{-- ↓既存のカード風レイアウトをここで出してもOK --}}
    @foreach($order->products as $product)
        <div class="row mb-5">
            <div class="col-md-3">
                <img src="{{ asset('storage/'.$product->image) }}" alt="" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h5>{{ $product->name }}</h5>
                <p>${{ number_format($product->price, 2) }}</p>
            </div>
            <div class="col-md-3 text-end">
                <a href="#" class="btn btn-outline-primary mb-2">WRITE A REVIEW</a>
                <br>
                <button class="btn btn-outline-secondary">Button Text</button>
            </div>
        </div>
    @endforeach

@endforeach
</div>
@endsection
