<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>Admin Page | Trente-trois style</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts: Alice 5/21-->
    <link href='https://fonts.googleapis.com/css?family=Alice' rel='stylesheet'>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    <style>
        * {

            font-family: 'Alice';

        }
    </style>
</head>

<body>

    {{-- 共通ヘッダー --}}
    <header class="py-3 border-bottom">
        <div class="container d-flex align-items-center">
            <img src="{{ asset('images/admin_logo.png') }}" alt="Logo" style="height: 60px;">
            <h1 class="ms-3 fw-normal fs-3">
                Trente-trois style <span class="fw-light">-Admin Page-</span>
            </h1>
        </div>
    </header>

    {{-- メインエリア --}}
    <main class="py-4">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer class="mt-auto">
        @include('layouts.footer')
    </footer>

</body>

</html>
