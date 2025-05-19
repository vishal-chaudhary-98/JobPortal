@extends('employer.auth.dashboard')
@section('main')
<div class= "container below-nav-content">

<div class="container">
    <div class="mb-4 p-5">
        <div class="title">
            <h1>{{ $job->title  }}</h1>
        </div>
        <hr>
        <div class="job-description m-5">
        {!! nl2br(e($job->description)) !!}

            <!-- { { $job->description }} -->
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
                    <a href=" {{ route('edit.job.post', ['id'=>$job->id]) }} " class="btn btn-primary">Update</a>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>

    </div>
</div>

</div>
@endsection
