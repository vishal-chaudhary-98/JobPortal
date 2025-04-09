<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Light/Dark Switch</title>
    @include('site.header.header')
    @vite ('resources/css/app.css')

  <!-- Bootstrap 5 CDN -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->

</head>
<body  class="dark-mode"> <!-- Start with light theme -->

    @include('site.nav.nav')
    @include('employer.auth.layout.left_nav')
  <div class="container py-5">
    <div class="theme-switch d-flex justify-content-between align-items-center">
      <h1>Theme Switcher</h1>

      <!-- Bootstrap 5 Switch -->
      <div class="form-check form-switch">
        <!-- 
          form-check: Bootstrap class for checkbox/radio controls
          form-switch: Converts checkbox into a switch
        -->
        <input class="form-check-input" type="checkbox" id="themeSwitch">
        <!-- form-check-input: Applies Bootstrap switch styling -->
        <label class="form-check-label" for="themeSwitch">Dark Mode</label>
        <!-- form-check-label: Associated label for the checkbox -->
      </div>
    </div>

    <p class="mt-4">
      This is a demo content area. Toggle the switch to change the theme.
    </p>
  </div>
  <div class="container my-section">
    <div class="card my-card">
      <h2>Card Title</h2>
      <p>Card content here...</p>
    </div>
    <div class="alert my-alert">This is an alert box</div>
  </div>

  <!-- Bootstrap JS Bundle (required for some Bootstrap features) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Custom JS to handle theme switch -->
  
    @vite(['resources/js/flashMessages'])
</body>
</html>
