@extends('employer.auth.dashboard')
@section('main')
<div class="container below-nav-content">
    <h2 class=" text-center">Update job</h2>
    <div class="container  position-relative  overflow-hidden" style="margin-top:2rem;">
        <form class="custom-form" method="post" action="{{ route('employer.update.post',['id' => $field->id]) }}">
            @csrf
            <div class="card p-5">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="title" class="form-label">Job title</label>
                        <input type="text" name="title" class="form-control" value="{{ $field->title }}">
                        @error('title')
                        <span class="alert text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="job_type" class="form-label">Job Type</label>
                        <select name="job_type" id="job_type" class="form-select">
                            @foreach($jobTypes as $jobType)
                            <option value="{{ $jobType->job_type }}" {{ old('job_type') == $jobType->job_type ? 'selected' : '' }}>
                                {{ $jobType->job_type }}
                            </option>
                            @endforeach
                        </select>
                        @error('job_type')
                        <span class="alert text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="location" class="form-label">Job location</label>
                        <input type="text" name="location" class="form-control" value="{{ $field->location }}">
                        @error('location')
                        <span class="alert text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="salary" class="form-label">Salery offered</label>
                        <input type="number" name="salary" class="form-control" value="{{ $field->salary }}">
                        @error('salary')
                        <span class="alert text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="description" class="form-label">Job description</label>
                        <textarea name="description" class="form-control"> {{ $field->description }} </textarea>
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
@endsection
