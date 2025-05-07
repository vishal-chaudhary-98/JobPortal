@extends('employee.auth.dashboard')
@section('employee')


<!--  Bio, Skills, LinkedIn, Github -->
<div class="container below-nav-content">
  <h2 class=" text-center">Add Personal details</h2>
  <div class="container  position-relative  overflow-hidden" style="margin-top:2rem;">
    <form class="employee-personal-details-form" method="post" action="{{ route('employee.profesional.details') }}">
      @csrf
      <div class="card p-5">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="bio" class="form-label">Add your bio</label>
            <textarea name="bio" class="form-control">{{ old('bio') }}</textarea>
            @error('bio')
            <span class="alert text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="col-md-6 mb-3">
            <label for="skills" class="form-label">Skills</label>
            <input type="text" name="skills" class="form-control" value="{{ old('skills') }}">
            @error('skills')
            <span class="alert text-danger">{ { $message }}</span>
            @enderror
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="linkedin" class="form-label">LinkedIn</label>
            <input type="text" name="linkedin" class="form-control" value="{{ old('linkedin') }}">
            @error('linkedin')
            <span class="alert text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="col-md-6 mb-3">
            <label for="github" class="form-label">Github</label>
            <input type="text" name="github" class="form-control" value="{{ old('github') }}">
            @error('github')
            <span class="alert text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <!-- Educational details -->
        <div class="row">
          <div class="accordion mb-5">
            <div class="accordion-item mb-4">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                  Educational details
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse p-4" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div id="education-container">
                  <div class="group-item position-relative border rounded p-3 mb-3">
                    <!-- Delete Button -->
                    <button type="button" class="btn-close position-absolute top-0 end-0 m-2" aria-label="Close" onclick="deleteSection(this)"></button>

                    <div class="accordion-body">
                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="degree" class="form-label">Degree</label>
                          <input type="text" name="education[degree][]" class="form-control" value="{{ old('degree') }}">
                          @error('degree')
                          <span class="alert text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="institution" class="form-label">College/University</label>
                          <input type="text" name="education[institution][]" class="form-control" value="{{ old('institution') }}">
                          @error('institution')
                          <span class="alert text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12 mb-3">
                          <label for="year" class="form-label">Year of Passing</label>
                          <select name="education[year][]" class="form-select">
                            <option value="">Select Year</option>
                            @for ($year = date('Y'); $year >= 1970; $year--)
                            <option value="{{ $year }}" {{ old('year') == $year ? 'selected' : '' }}>{{ $year }}</option>
                            @endfor
                          </select>
                          @error('year')
                          <span class="alert text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <button type="button" class="btn btn-success mt-2" onclick="cloneSection('education-container')">+ Add Another Education</button>
              </div>
            </div>
            <!-- Certification Details  -->
            <div class="accordion-item mb-4">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Certification
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse p-4" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div id="certification-container">
                  <div class="group-item position-relative border rounded p-3 mb-3">
                    <!-- Delete Button -->
                    <button type="button" class="btn-close position-absolute top-0 end-0 m-2" aria-label="Close" onclick="deleteSection(this)"></button>
                    <div class="accordion-body">
                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="course" class="form-label">Course name</label>
                          <input type="text" name="certificate[course][]" class="form-control" value="{{ old('certificate.course.0') }}">
                          @error('course')
                          <span class="alert text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="institute" class="form-label">Institution</label>
                          <input type="text" name="certificate[institute][]" class="form-control" value="{{ old('certificate.institute.0') }}">
                          @error('institute')
                          <span class="alert text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12 mb-3">
                          <label for="certificate_date" class="form-label">Certificate Received</label>
                          <input type="date" name="certificate[certificate_date][]" class="form-control" value="{{ old('certificate.certificate_date.0') }}">
                          @error('certificate_date')
                          <span class="alert text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <button type="button" class="btn btn-success mt-2" onclick="cloneSection('certification-container')">+ Add Another Certification</button>
              </div>
            </div>
            <!-- Experience Details  -->
            <div class="accordion-item mb-4">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Experience
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse p-4" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div id="experience-container">
                  <div class="group-item position-relative border rounded p-3 mb-3">
                    <!-- Delete Button -->
                    <button type="button" class="btn-close position-absolute top-0 end-0 m-2" aria-label="Close" onclick="deleteSection(this)"></button>
                    <div class="accordion-body">

                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="company" class="form-label">Company name</label>
                          <input type="text" name="experience[company][]" class="form-control" value="{{ old('experience.company.0') }}">
                          @error('company')
                          <span class="alert text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="role" class="form-label">Designation</label>
                          <input type="text" name="experience[role][]" class="form-control" value="{{ old('experience.role.0') }}">
                          @error('role')
                          <span class="alert text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="start_date" class="form-label">Start date</label>
                          <input type="date" name="experience[start_date][]" class="form-control" value="{{ old('experience.start_date.0') }}">
                          @error('start_date')
                          <span class="alert text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="end_date" class="form-label">End date</label>
                          <input type="date" name="experience[end_date][]" class="form-control" value="{{ old('experience.end_date.0') }}">
                          @error('end_date')
                          <span class="alert text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Add Another Button -->
                <button type="button" class="btn btn-success mt-2" onclick="cloneSection('experience-container')">+ Add Another Experience</button>
              </div>
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
<script>
  function cloneSection(containerId) {
    const container = document.getElementById(containerId);
    const firstGroup = container.querySelector('.group-item');
    const clone = firstGroup.cloneNode(true);
    // Clear all input, textarea, and select values
    clone.querySelectorAll('input, textarea, select').forEach(input => input.value = '');
    container.appendChild(clone);
  }

  function deleteSection(button) {
    // Find the closest group-item
    const groupItem = button.closest('.group-item');
    // Find the parent container dynamically (the direct parent of all group-items)
    const container = groupItem.parentElement;
    // Get all group-items inside this container
    const allGroups = container.querySelectorAll('.group-item');
    // Allow delete only if more than 1 group-item is present
    if (allGroups.length > 1) {
      groupItem.remove();
    } else {
      alert("At least one entry is required.");
    }
  }
</script>
