<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Employee Registration</title>
    @include('site.header.header')
    @vite ('resources/css/app.css')
</head>

<body>
    <!-- @ include('nav.nav') -->
    @include('site.nav.nav')

    <div class="container  position-relative  overflow-hidden" style="margin-top:12rem;">
        <form class="custom-form" method="post" action="{{ route('employee.registeration') }}" enctype="multipart/form-data">
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
                <label for="name" class="form-label">Date of birth</label>
                <input type="date" name="dob" class="form-control" value="{{ old('dob') }}">
                @error('dob')
                <span class="alert text-danger">{{ $message }}</span>
                @enderror
            </div>
            </div>
            <div class="mb-3">
                <label class="form-label d-block">Gender</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="genderMale" value="male" {{ old('gender') == 'male' ? 'checked' : '' }}>
                    <label class="form-check-label" for="genderMale">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}>
                    <label class="form-check-label" for="genderFemale">Female</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="genderOther" value="other" {{ old('gender') == 'other' ? 'checked' : '' }}>
                    <label class="form-check-label" for="genderOther">Other</label>
                </div>
                @error('gender')
                <span class="alert text-danger d-block">{{ $message }}</span>
                @enderror
            </div>
            <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nationality" class="form-label">Nationality</label>
                <input type="text" name="nationality" class="form-control" value="{{ old('nationality') }}" >
                @error('nationality')
                <span class="alert text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" aria-describedby="emailHelp">
                @error('email')
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
                <label for="nationality" class="form-label">Profile picture</label>
                <input type="file" name="profile" class="form-control" value="{{ old('profile') }}" >
                @error('profile')
                <span class="alert text-danger">{{ $message }}</span>
                @enderror
            </div>
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
                <p>If you are a new user <a href="{{ route('employee.login') }}">Login here</a></p>
            </div>
        </div>
        </form>
    </div>
</body>

</html>
