@extends('employer.auth.dashboard')
@section('main')
<div class="col-md-8">
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
</div>
@endsection
