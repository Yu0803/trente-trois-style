@php
    $isTop = request()->is('/');
@endphp

<nav class="navbar navbar-expand-lg fixed-top bg-transparent">
    <div class="container">
        <a class="navbar-brand align-items-center {{ $isTop ? 'text-white' : 'text-dark' }}" href="{{ url('/') }}">
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
                    <a class="nav-link {{ $isTop ? 'text-white' : 'text-dark' }}" href="{{ route('about') }}">ABOUT US</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $isTop ? 'text-white' : 'text-dark' }}" href="{{ route('contact') }}">CONTACT US</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $isTop ? 'text-white' : 'text-dark' }}" href="{{ route('blog') }}">BLOG</a>
                </li>

                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ $isTop ? 'text-white' : 'text-dark' }}" href="#" id="userDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->first_name }}'s My Page
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="{{ route('orders.history') }}">Order History</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth

                @guest
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ $isTop ? 'text-white' : 'text-dark' }}" href="#" id="loginDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            LOGIN
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="loginDropdown">
                            <li><a class="dropdown-item" href="{{ route('login') }}">User Login</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.login') }}">Admin Login</a></li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
