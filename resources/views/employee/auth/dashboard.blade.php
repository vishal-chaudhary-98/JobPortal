<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Employee dashboard</title>
    @include('site.header.header')
    @vite ('resources/css/app.css')
</head>

<body>
    <!-- @ include('nav.nav') -->
    @include('site.nav.nav')
    <div class="row">
        <div class="col-md-2 mt-3">
            @include('employee.auth.layout.areas.left_nav')
        </div>
        <div class="col-md-6 mt-3">
    <!-- Defining success and error messages -->
    <div class="success-error">
        @if (session('success'))
        <span class="alert alert-success">
            {{ session('success') }}
        </span>
        @elseif($errors->any())
        <!-- <ul> -->
        @foreach($errors->all() as $error)
        <!-- <li class="alert alert-danger"> -->

        <p class="text-danger"> {{ $error }}</p>
        <!-- </li> -->
        @endforeach
        <!-- </ul> -->
        @endif
    </div>
    <!-- End success and error messages -->
    @yield('employee')
        </div>
    </div>
</body>

</html>
