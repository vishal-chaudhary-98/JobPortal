<div class="col-md-6">
    <div class="card mb-4 mb-md-0" x-data="{ edit: false }">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <p class="mb-4"><span class="text-primary font-italic me-1">Company/Industry</span> Experience details</p>
                <a href="#" @click.prevent="edit = !edit"><span class="edit"><i class="fa-solid fa-pen-to-square"></i></span></a>
            </div>

            <!-- View Mode -->
            <div x-show="!edit">
                @foreach($experiences as $experience)
                <div class="company d-flex flex-row justify-content-between">
                    <h5 class="card-title mb-1" style="font-size: .77rem;">Company/Organization</h5>
                    <p class="card-text mb-1" style="font-size: .77rem;"> {{ $experience->company_name ?? '-'  }} </p>
                </div>

                <div class="company d-flex flex-row justify-content-between">
                    <h5 class="mt-4 mb-1" style="font-size: .77rem;">Role/Designation</h5>
                    <p class="card-text mt-4 mb-1" style="font-size: .77rem;"> {{ $experience->role ?? '-'  }} </p>
                </div>

                <div class="company d-flex flex-row justify-content-between">
                    <h5 class="mt-4 mb-1" style="font-size: .77rem;">Start date</h5>
                    <p class="card-text mt-4 mb-1" style="font-size: .77rem;"> {{ $experience->start_date ?? '-'  }} </p>
                </div>

                <div class="company d-flex flex-row justify-content-between">
                    <h5 class="mt-4 mb-1" style="font-size: .77rem;">End date</h5>
                    <p class="card-text mt-4 mb-1" style="font-size: .77rem;"> {{ $experience->end_date ?? '-'  }} </p>
                </div>
                <hr>
                @endforeach
            </div>

            <!-- Edit Mode -->
            <div x-show="edit" x-cloak>
                <form action="{{ route('employee.edit.experience') }}" method="POST">
                    @csrf
                    @method('PUT')

                    @foreach($experiences as $experience)
                    <div id="cloneExperience">
                        <div class="group-item">

                            <div class="mb-3">
                                <label class="form-label">Company Name</label>
                                <input type="text" class="form-control" name="experience[company][]" value="{{ $experience->company_name }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Designation</label>
                                <input type="text" class="form-control" name="experience[role][]" value="{{ $experience->role }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Start Date</label>
                                <input type="date" class="form-control" name="experience[start_date][]" value="{{ $experience->start_date }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">End Date</label>
                                <input type="date" class="form-control" name="experience[end_date][]" value="{{ $experience->end_date }}">
                            </div>
                            <div class="d-flex flex-row-reverse justify-content-between">
                                <a href="#" title="Delete this Experience"><span class="delete"><i class="fa-solid fa-trash"></i></span></a>
                                <a href="#" title="Add more Experience" onclick="cloneSection('cloneExperience')"><span class="add-more"><i class="fa-solid fa-plus"></i></span></a>
                            </div>
                            <hr>
                        </div>
                    </div>
                    @endforeach

                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                    <button type="button" class="btn btn-sm btn-secondary" @click="edit = false">Cancel</button>
                </form>
            </div>



        </div>
    </div>
</div>
<!-- @ vite('resources/js/profileEditRemove.js') -->
<script>
    function cloneSection(containerId) {
        const container = document.getElementById(containerId);
        const firstGroup = container.querySelector('.group-item');
        const clone = firstGroup.cloneNode(true);
        // Clear all input, textarea, and select values
        clone.querySelectorAll('input, textarea, select').forEach(input => input.value = '');
        container.appendChild(clone);
    }
</script>