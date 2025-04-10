<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Employer dashboard</title>
    @include('site.header.header')
    @vite ('resources/css/app.css')
</head>

<body class="dark-mode">
    <!-- @ include('nav.nav') -->
    @include('site.nav.nav')
    <div class="row mt-5">
        <div class="col-md-2">
            @include('employer.auth.layout.areas.left_nav')
        </div>
        <!-- Defining success and error messages -->
        <div class="col-md-8">
            <!-- Success and Error Flash Messages -->
            <div class="success-error mt-3 position-relative text-center d-flex">
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
            @yield('main')
        </div>
        <div class="col-md-2">
            @include('employer.auth.layout.areas.right_nav')
        </div>
    </div>
    @vite(['resources/js/flashMessages'])
</body>

</html>
