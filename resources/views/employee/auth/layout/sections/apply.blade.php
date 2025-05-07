@extends('employee.auth.dashboard')
@section('employee')

<!-- Apply for an individual job -->
<div class="container below-nav-content">

<div class="job-title">
    <h1>{{ $job->title }}</h1>
</div>
<div class="company">
    <p>{{ $employer->company_name }}</p>
</div>


</div>

    @endsection