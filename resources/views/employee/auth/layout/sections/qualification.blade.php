<div class="col-md-6">
    <div class="card mb-4 mb-md-0" x-data="{ edit: false }">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <p class="mb-4"><span class="text-primary font-italic me-1">College/University</span>Qualification</p>
                <a href="#" @click.prevent="edit = !edit"><span class="edit"><i class="fa-solid fa-pen-to-square"></i></span></a>
            </div>

            <!-- View Mode -->
            <div x-show="!edit">
                @foreach($educations as $education)
                <div class="company d-flex flex-row justify-content-between">
                    <h5 class="card-title mb-1" style="font-size: .77rem;">Course/Degree</h5>
                    <p class="card-text mb-1" style="font-size: .77rem;">{{ $education->degree ?? '-' }} </p>
                </div>

                <div class="company d-flex flex-row justify-content-between">
                    <h5 class="card-title mt-4 mb-1" style="font-size: .77rem;">College/University</h5>
                    <p class="card-text mt-4 mb-1" style="font-size: .77rem;"> {{ $education->institution ?? '-'  }} </p>
                </div>

                <div class="company d-flex flex-row justify-content-between">
                    <h5 class="card-title mt-4 mb-1" style="font-size: .77rem;">Pass out year</h5>
                    <p class="card-text mt-4 mb-1" style="font-size: .77rem;"> {{ $education->year ?? '-'  }} </p>
                </div>
                <hr>
                @endforeach
            </div>

            <!-- Edit Mode -->
            <div x-show="edit" x-cloak>
                <form action="{{ route('employee.edit.education') }}" method="POST">
                    @csrf
                    @method('PUT')

                    @foreach($educations as $education)
                    <div class="mb-3">
                        <label class="form-label">Company Name</label>
                        <input type="text" class="form-control" name="education[degree][]" value="{{ $education->degree }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Designation</label>
                        <input type="text" class="form-control" name="education[institution][]" value="{{ $education->institution }}">
                    </div>

                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="year" class="form-label">Year of Passing</label>
                                <select name="education[year][]" class="form-select">
                                    <option value="">Select Year</option>
                                    @for ($year = date('Y'); $year >= 1970; $year--)
                                    <option value="{{ $year }}" {{ old('education.year') == $year ? 'selected' : ($education->year == $year ? 'selected' : '') }}>
                                        {{ $year }}
                                    </option>
                                    @endfor
                                </select>
                                @error('education.year')
                                <span class="alert text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="d-flex flex-row-reverse justify-content-between">
                                <a href="#" title="Delete this Qualification"><span class="delete"><i class="fa-solid fa-trash"></i></span></a>
                                <a href="#"  title="Add more Qualifications"><span class="add-more"><i class="fa-solid fa-plus"></i></span></a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    @endforeach

                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                    <button type="button" class="btn btn-sm btn-secondary" @click="edit = false">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
