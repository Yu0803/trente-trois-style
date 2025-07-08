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
      
      @include('layouts.header') <!-- ✅ ここでヘッダーを読み込み -->
      
      <main class="py-0">
        @yield('content')
      </main>

      @include('layouts.footer') <!-- ✅ フッターも共通で読み込み -->

    </div>
  </div>

  
</body>

</html>
