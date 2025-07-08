@extends('layouts.app')

@section('content')
    <!-- Hero Section 5/21-->
    <div class="hero-image d-flex flex-column justify-content-center align-items-center text-white text-center"
        style="background: url('/images/login-hero.jpg') center center/cover no-repeat; height: 400px;">
        {{-- <h1 style="font-size: 2.5rem; font-weight: bold;">Log In</h1> --}}
        {{-- <p style="font-size: 1.2rem;">Hi! Welcome back, you’ve been missed.</p> --}}
    </div>
    <div class="container py-5">
        <h1 class="text-center mb-4">Order History</h1>
        <p class="text-center">Orders Count: {{ $orders->count() }}</p>

        @foreach ($orders as $order)
            <h3>Order #{{ $order->id }} ({{ $order->status }})</h3>
            <p>Order Date: {{ $order->created_at->format('Y/m/d') }}</p>


            @if ($order->orderItems)
                @foreach ($order->orderItems as $item)
                    @php
                        $product = $item->product;
                    @endphp
                    <div class="row mb-5 border-bottom pb-3">
                        <div class="col-md-3">
                            <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('images/no-image.png') }}"
                                alt="{{ $product->name }}" class="img-fluid"
                                style="width: 100%; height: 200px; object-fit: contain;">

                        </div>
                        <div class="col-md-6">
                            <h5>{{ $product->name }}</h5>
                            <p>Price: ${{ number_format($item->price ?? $product->price, 2) }}</p>
                            <p>Quantity: {{ $item->quantity ?? 1 }}</p>
                        </div>
                        <div class="col-md-3 text-end">
                            {{-- レビュー投稿ページへのリンク --}}
                            <a href="{{ route('products.show', ['id' => $product->id]) }}"
                                class="btn btn-outline-primary mb-2">
                                WRITE A REVIEW
                            </a>


                            {{-- 「もう一度注文」ボタン --}}
                            <form method="POST" action="{{ route('cart.orderAgain') }}">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="quantity" value="{{ $item->quantity ?? 1 }}">
                                <button class="btn btn-outline-secondary">Order Again</button>
                            </form>
                        </div>

                    </div>
                @endforeach
            @endif
        @endforeach




    </div>
@endsection
