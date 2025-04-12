<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top site-nav">
    <div class="container-fluid">
        <!-- Navbar brand -->
        <a class="navbar-brand"  href="#">
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
                    <a class="nav-link" href="#" rel="nofollow" >Our Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" >About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('test') }}" >Test</a>
                </li>
            </ul>
            
            <!-- Success and Error Flash Messages -->
            <div class="success-error">
                @if (session('success'))
                <div class="alert alert-success flash-message">
                    {{ session('success') }}
                </div>
                @elseif($errors->any())
                @foreach($errors->all() as $error)
                <div class="alert alert-danger flash-message">
                    {{ $error }}
                </div>
                @endforeach
                @endif
            </div>
            <!-- End success and error messages -->

            <!-- Guest -->
            @guest
            <ul class="navbar-nav d-flex flex-row">
                <li class="nav-item me-3 me-lg-0">
                    <a class="nav-link" href="#"><i class="fab fa-youtube"></i></a>
                </li>
                <li class="nav-item me-3 me-lg-0">
                    <a class="nav-link" href="#"><i class="fab fa-facebook-f"></i></a>
                </li>
                <li class="nav-item me-3 me-lg-0">
                    <a class="nav-link" href="#"><i class="fab fa-twitter"></i></a>
                </li>
                <li class="nav-item me-3 me-lg-0">
                    <a class="nav-link" href="#"><i class="fab fa-github"></i></a>
                </li>
            </ul>
            @endguest

            <!-- Web User -->
            @if(Auth::guard('web')->check())
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="{{ Auth::guard('web')->user()->profile ? asset('uploads/profiles/' . Auth::guard('web')->user()->profile) : asset('uploads/1.jpg') }}"
                            class="rounded-circle" alt="User Profile Picture" width="40" height="40">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>
                            <p class="text-center">{{ Auth::guard('web')->user()->name }}</p>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('employee.dashboard') }}">Dashboard</a></li>
                        <li><a class="dropdown-item" href="{{ route('employee.personal.info') }}">Edit personal details</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="{{ route('employee.logout') }}" method="post">
                                @csrf
                                <button class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
            @endif

            <!-- Employer User -->
            @if(Auth::guard('employer')->check())
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="{{ Auth::guard('employer')->user()->profile ? asset('uploads/profiles/' . Auth::guard('employer')->user()->profile) : asset('uploads/1.jpg') }}"
                            class="rounded-circle" alt="User Profile Picture" width="40" height="40">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>
                            <p class="text-center">{{ Auth::guard('employer')->user()->name }}</p>
                        </li>
                        <li><a class="dropdown-item" href="#">Edit personal details</a></li>
                        <li><a class="dropdown-item" href="{{ route('employer.post.job') }}">Post new job</a></li>
                        <li><a class="dropdown-item" href="#">Edit password</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
            @endif
        </div>
    </div>
</nav>
<!-- End Navbar -->
