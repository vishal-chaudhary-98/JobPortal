<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Employee Login</title>
    @include('site.header.header')
    @vite('resources/css/app.css')
</head>

<body>
    <!-- @ include('nav.nav') -->
    @include('site.nav.nav')

    <div class="container  position-relative  overflow-hidden" style="margin-top:12rem;">
        <form class="custom-form" method="post" action="{{ route('employee.login.post') }}">
            @csrf
            <div class="card p-5">
                <div class="mb-3">
                <label for="userName" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" aria-describedby="emailHelp">
                @error('email')
                <span class="alert text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="pswd" class="form-control" id="exampleInputPassword1">
                @error('pswd')
                <span class="alert text-danger">{{ $message }} </span>
                @enderror
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" checked>
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <div class="d-flex  justify-content-between">
                <button type="submit" class="btn btn-primary">Submit</button>
                <p>If you are a new user <a href="{{ route('employee.register') }}"> Register here</a></p>
            </div>
            </div>

        </form>
    </div>
</body>

</html>
