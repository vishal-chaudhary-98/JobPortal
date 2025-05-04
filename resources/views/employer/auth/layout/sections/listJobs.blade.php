@extends('employer.auth.dashboard')
@section('main')
<div class="container below-nav-content">
    <h2 class="text-center">Dashboard</h2>
    <div class="content-area d-flex flex-wrap ">
        @foreach($jobs as $job)
        <div class="card" style="width: 18rem;margin:0px 20px 10px 0px;">
            <div class="card-body">
                <h5 class="card-title">{{ $job->title }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $job->location }}</h6>
                <!-- <p class="card-text">{ { $job->description }}</p> -->
                <p class="card-text">
                    {{ \Illuminate\Support\Str::words($job->description, 15, '...') }}  <!--    Word limit added for job description    -->
                </p>
                <p class="card-text"><strong>{{ $job->employer->company_name ?? 'N/A' }}</strong></p>
                <a href="{{ route('edit.job.post',['id' => $job->id]) }}" class="card-link">Edit post</a>
                <a href="{{ route('employer.view.job') }}" class="card-link">View post</a>
                <a href="{{ route('single.job.post',['id' => $job->id]) }}" class="card-link">View post</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
