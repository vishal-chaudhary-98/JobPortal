@extends('employee.auth.dashboard')
@section('employee')

<div class="container">
    <div class="mb-4 p-5">
        <div class="title">
            <h1>{{ $job->title  }}</h1>
        </div>
        <hr>
        <div class="job-description m-5">
            {{ $job->description }}
        </div>
        <hr>
        <div class="jod-details mb-5">
            {{ $job->type }}
            <br><br><br>
            {{ $job->salary }}
            <br><br><br>
            {{ $job->location }}
            <br><br><br>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="d-flex justify-content-between">
                    <a href=" {{ route('employee.apply.job', ['id'=>$job->id]) }} " class="btn btn-primary">Apply</a>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection