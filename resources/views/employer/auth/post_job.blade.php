<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Post a job</title>
    @include('site.header.header')
    @vite ('resources/css/app.css')
</head>

<body>
    <!-- @ include('nav.nav') -->
    @include('site.nav.nav')
    @include('employer.auth.layout.left_nav')

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
    <div class="container below-nav-content">
        <h2 class=" text-center">Post a job</h2>
    <div class="container  position-relative  overflow-hidden" style="margin-top:2rem;">
        <form class="custom-form" method="post" action="{{ route('job.store.post') }}">
            @csrf
            <div class="card p-5">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="title" class="form-label">Job title</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                        @error('title')
                        <span class="alert text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="type" class="form-label">Job type</label>
                        <input type="text" name="type" class="form-control" value="{{ old('type') }}">
                        @error('type')
                        <span class="alert text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="location" class="form-label">Job location</label>
                        <input type="text" name="location" class="form-control" value="{{ old('location') }}">
                        @error('location')
                        <span class="alert text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="salary" class="form-label">Salery offered</label>
                        <input type="number" name="salary" class="form-control" value="{{ old('salary') }}">
                        @error('salary')
                        <span class="alert text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="description" class="form-label">Job description</label>
                        <textarea name="description" class="form-control" value="{{ old('description') }}"> </textarea>
                        @error('description')
                        <span class="alert text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="d-flex  justify-content-between">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">Back</a>
                </div>
            </div>
        </form>
    </div>
    </div>
</body>

</html>
