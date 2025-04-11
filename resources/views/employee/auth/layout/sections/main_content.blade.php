@extends('employee.auth.dashboard')
@section('employee')
<div class="below-nav-content">
    <h2 class="text-center">Dashboard for employees</h2>
    <div class="content-area d-flex flex-column-reverse ">
        @foreach($jobs as $job)
        <div class="card" style="margin:0px 20px 15px 0px;">
            <div class="card-body">
                <h5 class="card-title">{{ $job->title }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $job->location }}</h6>
                <p class="card-text">{{ $job->description }}</p>
                <p class="card-text"><strong>{{ $job->salary }}</strong></p>
                <a href="#" class="card-link">{{ $job->type }}</a>
                <a href="#" class="card-link">View full job</a>
            </div>
        </div>
        @endforeach
    </div>
 </div>
@endsection
