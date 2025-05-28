@extends('layouts.app')

@section('content')

<!-- Hero Section 5/21-->
<div class="hero-image d-flex flex-column justify-content-center align-items-center text-white text-center container-wide" style="background: url('/images/login-hero.jpg') center center/cover no-repeat; height: 400px;">
    {{-- <h1 style="font-size: 2.5rem; font-weight: bold;">Log In</h1> --}}
    {{-- <p style="font-size: 1.2rem;">Hi! Welcome back, you’ve been missed.</p> --}}
</div>

<!-- About Us Content -->
<div class="container-wide my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
            <p class="mb-4" style="line-height: 2; font-size: 1.1rem;">
                あなたの「特別な一日」を、もっと心ときめくものに。<br>
                私たちは、エンジニア初心者の女性3人による小さなクリエイティブチームです。<br>
                結婚の準備を通じて、もっと楽しく優しい思い出にしたいという気持ちからこのECサイトを立ち上げました。<br><br>
                計画は楽しいけど、時に大変で不安なもの。<br>
                だからこそ、見た目も可愛くて、気持ちが明るくなるようなアイテムを届けたい。<br>
                私たちはデザインだけでなく、使いやすさや実用性にもこだわっています。<br><br>
                少しでも誰かの大切な1日のお手伝いができたら、心から嬉しく思います。
            </p>

            <p class="mb-5" style="line-height: 2;">
                <em>Make your special day even more magical and heartwarming.</em><br>
                We are a small, creative team of three beginner engineers, united by one simple wish —<br>
                to bring more joy and beauty to your once-in-a-lifetime moments.
            </p>
        </div>
    </div>
</div>

<!-- Shop Preview Section -->
<div class="text-center my-5">
    <h3 class="fw-bold mb-4">Shop</h3>
    <div class="container-wide">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <img src="/images/shop1.jpg" class="img-fluid rounded shadow-sm" alt="Shop Image 1">
            </div>
            <div class="col">
                <img src="/images/shop2.jpg" class="img-fluid rounded shadow-sm" alt="Shop Image 2">
            </div>
            <div class="col">
                <img src="/images/shop3.jpg" class="img-fluid rounded shadow-sm" alt="Shop Image 3">
            </div>
        </div>
    </div>
</div>

<!-- 共通パーツ（もし他ページと同じなら分ける）-->
{{-- @include('partials.benefits') --}}

@endsection
