<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Employer dashboard</title>
    @include('site.header.header')
    @vite ('resources/css/app.css')
</head>

<body  class="dark-mode">
    <!-- @ include('nav.nav') -->
    @include('site.nav.nav')
    @include('employer.auth.layout.left_nav')
    <!-- Defining success and error messages -->
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
<div class="container below-nav-content">
    <h2 class="text-center">Dashboard</h2>
<div class="content-area d-flex">
  @foreach($jobs as $job)
<div class="card" style="width: 18rem;margin-right:20px;">
  <div class="card-body">
    <h5 class="card-title">{{ $job->title }}</h5>
    <h6 class="card-subtitle mb-2 text-muted">{{ $job->location }}</h6>
    <p class="card-text">{{ $job->description }}</p>
    <a href="#" class="card-link">{{ $job->type }}</a>
    <a href="#" class="card-link">Another link</a>
  </div>
</div>
  @endforeach

</div>
</div>
    <!-- End success and error messages -->
@vite(['resources/js/flashMessages'])
</body>

</html>
