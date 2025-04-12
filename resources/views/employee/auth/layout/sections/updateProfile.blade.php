@extends('employee.auth.dashboard')
@section('employee')

<div class="container mt-5">
    <form class="update-form" method="post" action="{{ route('employee.update.profile') }}" enctype="multipart/form-data">
        @csrf
        <div class="card p-5">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $employee->name }}">
                    @error('name')
                    <span class="alert text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Date of birth</label>
                    <input type="date" name="dob" class="form-control" value="{{ $employee->dob }}">
                    @error('dob')
                    <span class="alert text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label d-block">Gender</label>
                <div class="form-check form-check-inline">
                    <input type="radio" name="gender" value="Male"
                        {{ (old('gender', $employee->gender) == 'Male') ? 'checked' : '' }}>
                    <label class="form-check-label" for="genderMale">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" name="gender" value="Female"
                        {{ (old('gender', $employee->gender) == 'Female') ? 'checked' : '' }}>
                    <label class="form-check-label" for="genderFemale">Female</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" name="gender" value="Other"
                        {{ (old('gender', $employee->gender) == 'Other') ? 'checked' : '' }}>
                    <label class="form-check-label" for="genderOther">Other</label>
                </div>
                @error('gender')
                <span class="alert text-danger d-block">{{ $message }}</span>
                @enderror
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nationality" class="form-label">Nationality</label>
                    <input type="text" name="nationality" class="form-control" value="{{ $employee->nationality }}">
                    @error('nationality')
                    <span class="alert text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $employee->email }}" aria-describedby="emailHelp">
                    @error('email')
                    <span class="alert text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="contact" class="form-label">Contact</label>
                    <input type="number" name="contact" class="form-control" value="{{ $employee->contact }}">
                    @error('contact')
                    <span class="alert text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="nationality" class="form-label">Profile picture</label>
                    <input type="file" name="profile" class="form-control" value="{{ $employee->profile }}">
                    @error('profile')
                    <span class="alert text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="d-flex  justify-content-between">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>

@endsection