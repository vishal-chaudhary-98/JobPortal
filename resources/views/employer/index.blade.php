<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Employer Login</title>
    @include('site.header.header')
    @vite('resources/css/app.css')
</head>

<body>
    <!-- @ include('nav.nav') -->
    @include('site.nav.nav')

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

    <div class="container  position-relative  overflow-hidden" style="margin-top:12rem;">
        <form class="custom-form" method="post" action="#">
            @csrf
            <div class="card p-5">            <div class="mb-3">
                <label for="userName" class="form-label">Email</label>
                <input type="text" name="userName" class="form-control" value="{{ old('userName') }}" aria-describedby="userNameHelp">
                @error('userName')
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
                <p>If you are a new user <a href="{{ route('employer.register') }}"> Register here</a></p>
            </div>
            </div>

        </form>
    </div>
</body>

</html>
