@extends('employee.auth.dashboard')
@section('employee')

<div class="container below-nav-content">
    <section class="view-profile" style="background-color: #eee;">
        <div class="container p-5">
            <!-- Page top path  -->
            <!-- <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">User</a></li>
                            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                        </ol>
                    </nav>
                </div>
            </div> -->

            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="{{ Auth::guard('web')->user()->profile ? asset('uploads/profiles/' . Auth::guard('web')->user()->profile) : asset('uploads/1.jpg') }}" alt="avatar"
                                class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3">
                                {{ Auth::guard('web')->user()->name }}
                            </h5>
                            <p class="text-muted mb-1">{{ optional($experiences->first())->company_name ?? 'Add experience of pervious company(if any)' }}</p>
                            <p class="text-muted mb-4">{{ optional($experiences->first())->role ?? 'Add your role in previous company' }}</p>
                            <div class="d-flex justify-content-center mb-2">
                                <!-- <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary">Follow</button> -->
                                <!-- <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-primary ms-1">Edit profile</button> -->
                            </div>
                        </div>
                    </div>

                    <!-- Certification  -->
                    @include('employee.auth.layout.sections.certification')

                    <!-- <div class="card mb-4 mb-lg-0">
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush rounded-3">
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fas fa-globe fa-lg text-warning"></i>
                                    <p class="mb-0">https://mdbootstrap.com</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-github fa-lg text-body"></i>
                                    <p class="mb-0">mdbootstrap</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                                    <p class="mb-0">@mdbootstrap</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                                    <p class="mb-0">mdbootstrap</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                                    <p class="mb-0">mdbootstrap</p>
                                </li>
                            </ul>
                        </div>
                    </div> -->
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div x-data="{ edit: false }" class="row">
                                <!-- View Mode -->
                                <div x-show="!edit" class="col-sm-10" style="margin:20px 0px 20px 40px;">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Full Name</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{ Auth::user()->name }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Email</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{ Auth::user()->email }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Phone</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{ Auth::user()->contact }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Nationality</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{ Auth::user()->nationality }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Bio</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{ $profile->bio ?? 'Add your bio' }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Skills</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{ $profile->skills ?? 'Add your skills' }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">LinkedIn</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{ $profile->linkedin ?? 'Add your LinkedIn' }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Github</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{ $profile->github ?? 'Add your Github' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <a href="#" @click.prevent="edit = true"><i class="fa-solid fa-pen-to-square"></i></a>
                                </div>

                                <!-- Edit Mode -->
                                <div x-show="edit" x-cloak class="col-sm-12 mt-4">
                                    <form method="POST" action="{{ route('employee.edit.personal.details') }}">
                                        @csrf
                                        @method('PUT')

                                        <div class="row mb-2">
                                            <div class="form-label col-sm-3">Full name</div>
                                            <div class="input col-sm-8">
                                                <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
                                            </div>
                                        </div>


                                        <div class="row mb-2">
                                            <div class="form-label col-sm-3">Email</div>
                                            <div class="input col-sm-8">
                                                <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}">
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="form-label col-sm-3">Phone</div>
                                            <div class="input col-sm-8">
                                                <input type="text" name="contact" class="form-control" value="{{ Auth::user()->contact }}">
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="form-label col-sm-3">Nationality</div>
                                            <div class="input col-sm-8">
                                                <input type="text" name="nationality" class="form-control" value="{{ Auth::user()->nationality }}">
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="form-label col-sm-3">Bio</div>
                                            <div class="input col-sm-8">
                                                <textarea name="bio" class="form-control">{{ $profile->bio ?? '' }}</textarea>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="form-label col-sm-3">Skills</div>
                                            <div class="input col-sm-8">
                                                <input type="text" name="skills" class="form-control" value="{{ $profile->skills ?? '' }}">
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="form-label col-sm-3">LinkedIn</div>
                                            <div class="input col-sm-8">
                                                <input type="text" name="linkedin" class="form-control" value="{{ $profile->linkedin ?? '' }}">
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="form-label col-sm-3">Github</div>
                                            <div class="input col-sm-8">
                                                <input type="text" name="github" class="form-control" value="{{ $profile->github ?? '' }}">
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-between">
                                            <button type="submit" class="btn btn-sm btn-primary">Save</button>
                                            <button type="button" class="btn btn-sm btn-secondary" @click="edit = false">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Qualification  -->
                        @include('employee.auth.layout.sections.qualification')

                        <!-- Experience  -->
                        @include('employee.auth.layout.sections.experience')

                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection
