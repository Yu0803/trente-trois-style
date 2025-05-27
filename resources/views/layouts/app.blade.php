<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Google Fonts: Alice 5/21-->
    <link href='https://fonts.googleapis.com/css?family=Alice' rel='stylesheet'>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>

*{

font-family: 'Alice';

}

</style>

    <!-- layouts/app.blade.php や layouts/guest.blade.php などに追加 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">




    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    

</head>

<body>
    <div id="app">
        <div class="page-wrapper">
        <!-- 上段ナビ（インフォメーションバー） -->
<nav class="navbar py-1 bg-navy text-white">
  <div class="container d-flex justify-content-center small">
    FREE SHIPPING & RETURNS ON ALL JAPAN ORDERS
  </div>
</nav>

<!-- 下段ナビ（ロゴ付きメインナビ） -->
<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
      <img src="{{ asset('images/logo.png') }}" alt="Logo" height="40" class="me-2">
      <span class="fw-bold">Trente-trois style</span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
      aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainNavbar">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">ABOUT US</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">CONTACT US</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


        <main class="py-0">
            @yield('content')
        </main>
    </div>
    @include('layouts.footer')

</body>

</html>
