@extends('employee.auth.dashboard')
@section('employee')
<div class="below-nav-content">
    <h2 class="text-center">Dashboard for employees</h2>
    <div class="container employee-job-listing">
        @foreach($jobs as $job)
        <div class="job-listing border-bottom py-3 d-flex flex-column">
            <div class="d-flex justify-content-between align-items-start flex-wrap">
                <div class="job-info">
                    <h5 class="mb-1">{{ $job->title }}</h5>
                    <h6 class="text-muted mb-2">{{ $job->location }}</h6>
                    <p class="mb-2">{{ Str::limit($job->description, 250) }}</p>
                    <div>
                        <span class="badge bg-primary text-white me-2">{{ $job->type }}</span>
                        <strong class="text-success me-2">₹, {{ $job->salary }}</strong>
                        <!-- <a href="#" class="text-decoration-none">View full job</a> -->
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
