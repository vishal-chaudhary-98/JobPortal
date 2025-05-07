<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="//unpkg.com/alpinejs" defer></script>


    <title>Employee dashboard</title>
    @include('site.header.header')
    @vite ('resources/css/app.css')
</head>

<body>
    <!-- @ include('nav.nav') -->
    @include('site.nav.nav')
    <div class="employee-container m-auto">
        <div class="row">
            <div class="col-md-2">
                @include('employee.auth.layout.areas.left_nav')
            </div>
            <div class="col-md-10" style="margin:4rem 0px 0px 0px;">
                @yield('employee')
            </div>
        </div>
    </div>
    @vite(['resources/js/flashMessages'])

</body>

</html>
