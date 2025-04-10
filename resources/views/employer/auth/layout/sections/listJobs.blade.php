@extends('employer.auth.dashboard')
@section('main')
<div class="container below-nav-content">
    <h2 class="text-center">Dashboard</h2>
    <div class="content-area d-flex">
        @foreach($jobs as $job)
        <div class="card" style="width: 18rem;margin-right:20px;">
            <div class="card-body">
                <h5 class="card-title">{{ $job->title }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $job->location }}</h6>
                <p class="card-text">{{ $job->description }}</p>
                <p class="card-text"><strong>{{ $job->employer->company_name ?? 'N/A' }}</strong></p>
                <a href="#" class="card-link">{{ $job->type }}</a>
                <a href="#" class="card-link">View full job</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
