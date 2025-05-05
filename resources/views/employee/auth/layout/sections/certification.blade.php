<!-- Alpine.js component wrapper -->
<div class="card mb-4 mb-md-0" x-data="{ edit: false }">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <p class="mb-4">
                <span class="text-primary font-italic me-1">Certification</span> Training/Workshop
            </p>
            <a href="#" @click.prevent="edit = !edit">
                <span class="edit"><i class="fa-solid fa-pen-to-square"></i></span>
            </a>
        </div>

        <!-- View Mode -->
        <div x-show="!edit">
            @foreach($certifications as $certification)
            <div class="company d-flex flex-row justify-content-between">
                <h5 class="card-title mb-1" style="font-size: .77rem;">Course name</h5>
                <p class="card-text mb-1" style="font-size: .77rem;"> {{ $certification->name ?? '-' }} </p>
            </div>

            <div class="company d-flex flex-row justify-content-between">
                <h5 class="mt-4 mb-1" style="font-size: .77rem;">Institute</h5>
                <p class="card-text mt-4 mb-1" style="font-size: .77rem;"> {{ $certification->institution ?? '-' }} </p>
            </div>

            <div class="company d-flex flex-row justify-content-between">
                <h5 class="mt-4 mb-1" style="font-size: .77rem;">Certificate issued date</h5>
                <p class="card-text mt-4 mb-1" style="font-size: .77rem;"> {{ $certification->date_received ?? '-' }} </p>
            </div>
            <hr>
            @endforeach
        </div>

        <!-- Edit Mode -->
        <div x-show="edit" x-cloak>
            <form action="{{ route('employee.edit.certification') }}" method="POST">
                @csrf
                @method('PUT')

                @foreach($certifications as $certification)
                <div class="mb-3">
                    <label class="form-label">Course Name</label>
                    <input type="text" class="form-control" name="certificate[course][]" value="{{ $certification->name }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Institute</label>
                    <input type="text" class="form-control" name="certificate[institute][]" value="{{ $certification->institution }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Certificate Issued Date</label>
                    <input type="date" class="form-control" name="certificate[certificate_date][]" value="{{ $certification->date_received }}">
                </div>
                <div class="d-flex flex-row-reverse justify-content-between">
                    <a href="#" title="Delete this Certification"><span class="delete"><i class="fa-solid fa-trash"></i></span></a>
                    <a href="#" title="Add more Certification"><span class="add-more"><i class="fa-solid fa-plus"></i></span></a>
                </div>
                <hr>
                @endforeach

                <button type="submit" class="btn btn-sm btn-primary">Update</button>
                <button type="button" class="btn btn-sm btn-secondary" @click="edit = false">Cancel</button>
            </form>
        </div>
    </div>
</div>
