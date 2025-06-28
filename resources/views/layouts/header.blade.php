<nav class="navbar py-1 text-white " style="background-color: #024E82">
    <div class="container d-flex justify-content-center small">
        FREE SHIPPING & RETURNS ON ALL JAPAN ORDERS
    </div>
</nav>

<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom container-wide">
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
                    <a class="nav-link" href="{{ route('about') }}">ABOUT US</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">CONTACT US</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('blog') }}">BLOG</a>
                </li>

                @auth
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-dark rounded-pill px-3">
                                LOGOUT
                            </button>
                        </form>
                    </li>
                @endauth



                @guest
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="loginDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            LOGIN
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="loginDropdown">
                            <li><a class="dropdown-item" href="{{ route('login') }}">User Login</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.login') }}">Admin Login</a></li>
                        </ul>
                    </li>
                @endguest


            </ul>
        </div>
    </div>
</nav>
