<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Employer Registration</title>
    @include('site.header.header')
    @vite ('resources/css/app.css')
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
            <div class="card p-5">
            <div class="row">
            <div class="col-md-6 mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                @error('name')
                <span class="alert text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="companyName" class="form-label">Company name</label>
                <input type="text" name="companyName" class="form-control">
                @error('companyName')
                <span class="alert text-danger">{{ $message }}</span>
                @enderror
            </div>
            </div>
            <div class="row">
            <div class="col-md-6 mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" name="description" class="form-control" value="{{ old('description') }}" >
                @error('description')
                <span class="alert text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" class="form-control" value="{{ old('address') }}" aria-describedby="addressHelp">
                @error('address')
                <span class="alert text-danger">{{ $message }}</span>
                @enderror
            </div>
            </div>
            <div class="row">
            <div class="col-md-6 mb-3">
                <label for="contact" class="form-label">Contact</label>
                <input type="number" name="contact" class="form-control" value="{{ old('contact') }}" >
                @error('contact')
                <span class="alert text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" >
                @error('email')
                <span class="alert text-danger">{{ $message }}</span>
                @enderror
            </div>
            </div>

            <div class="col-md-12 mb-3">
                <label for="description" class="form-label">Company Description</label>
                <textarea name="companyDescription" class="form-control" value="{{ old('companyDescription') }}" ></textarea>
                @error('description')
                <span class="alert text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="row">
            <div class="col-md-6 mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="pswd" class="form-control" id="exampleInputPassword1">
                @error('pswd')
                <span class="alert text-danger">{{ $message }} </span>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                <input type="password" name="cpswd" class="form-control" id="exampleInputPassword1">
                @error('cpswd')
                <span class="alert text-danger">{{ $message }} </span>
                @enderror
            </div>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" checked>
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <div class="d-flex  justify-content-between">
                <button type="submit" class="btn btn-primary">Submit</button>
                <p>If you are a new user <a href="{{ route('employer.login') }}">Login here</a></p>
            </div>
        </div>
        </form>
    </div>
</body>

</html>
