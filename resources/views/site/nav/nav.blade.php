<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top" style="z-index:0;">
    <div class="container-fluid">
        <!-- Navbar brand -->
        <a class="navbar-brand" target="_blank" href="#">
            <img src="https://www.logolounge.com/wp-content/uploads/2023/12/5_452189-300x300.png" height="66" alt="logo"
                loading="lazy" style="margin-top: -3px;" />
        </a>
        <button class="navbar-toggler" type="button" data-mdb-collapse-init data-mdb-target="#navbarExample01"
            aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarExample01">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" rel="nofollow"
                        target="_blank">Our Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" target="_blank">About Us</a>
                </li>
            </ul>
            @guest
            <ul class="navbar-nav d-flex flex-row">
                <!-- Icons -->
                <li class="nav-item me-3 me-lg-0">
                    <a class="nav-link" href="#" rel="nofollow">
                        <i class="fab fa-youtube"></i>
                    </a>
                </li>
                <li class="nav-item me-3 me-lg-0">
                    <a class="nav-link" href="#" rel="nofollow">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </li>
                <li class="nav-item me-3 me-lg-0">
                    <a class="nav-link" href="#" rel="nofollow">
                        <i class="fab fa-twitter"></i>
                    </a>
                </li>
                <li class="nav-item me-3 me-lg-0">
                    <a class="nav-link" href="#" rel="nofollow">
                        <i class="fab fa-github"></i>
                    </a>
                </li>
            </ul>
            @endguest
            @auth
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <!-- User profile picture (circle) -->
                        @if(auth()->check())
                        <img src="{{ auth()->user()->profile ? asset('uploads/profiles/' . auth()->user()->profile) : asset('uploads/1.jpg') }}" class="rounded-circle" alt="User Profile Picture" width="40" height="40">
                        @else
                        <img src="{{ asset('uploads/1.jpg') }}" class="rounded-circle" alt="Default Profile Picture" width="40" height="40">
                        @endif
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>
                            <p class="text-center">{{ auth()->user()->name }}</p>
                        </li>
                        <li><a class="dropdown-item" href="#">Edit personal details</a></li>
                        <!-- <li><a class="dropdown-item" href="#">Change name</a></li> -->
                        <li><a class="dropdown-item" href="#">Edit password</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
            @endauth
        </div>
    </div>
</nav>
<!-- Navbar -->
