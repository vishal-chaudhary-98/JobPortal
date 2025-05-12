@extends('employee.auth.dashboard')
@section('employee')
<!-- CSS for this section  -->
<style>
    .cv-upload-container {
        margin-top: 20px;
        text-align: center;
    }

    .upload-box {
        border: 2px dashed #ccc;
        padding: 40px;
        background-color: #fafafa;
        cursor: pointer;
        transition: border-color 0.3s;
        position: relative;
    }

    .upload-box:hover {
        border-color: #888;
    }

    .upload-box p {
        margin: 0;
        font-size: 16px;
    }

    .upload-box span {
        color: #007bff;
        text-decoration: underline;
        cursor: pointer;
    }

    #cvInput {
        display: none;
    }

    input[type=file]::file-selector-button {
        border: transparent;
        background-color: rgb(255, 255, 255);
        transition: 1s;
        color: #007bff;
    }

    .apply-job-box {
        width: 70%;
    }

    select.form-select {
        width: 60%;
    }

    textarea.form-control {
        width: 60%;
    }
</style>


<!-- Apply for an individual job -->
<div class="container below-nav-content">
    <div class="apply-job-box">
        <div class="job-title text-center mb-5">
            <h1>{{ $job->title }}</h1>
        </div>
        <div class="cv-upload-container">
            <p>Add your resume for employees</p>
            <div class="upload-box" id="uploadBox">
                <p>Drag and drop your PDF here, or <span id="browseTrigger"><input type="file" name="upload-cv"></span></p>
                <!-- <input type="file" id="cvInput" name="cv" accept="application/pdf"> -->
            </div>
        </div>

        <div class="add-education mt-5">
            <p>Add your latest education, experience and other skills</p>
            <div class="row">
                <div class="d-flex">
                    <div class="col-sm-6">
                        <div class="degree">
                            <p>Choose your late Qualification</p>
                            <select name="education" class="form-select">
                                <option selected>Select education</option>
                                @foreach($educations as $education)
                                @if ($employeeId == $education->employee_id )
                                <option value="{{ $education->degree }}">{{ $education->degree }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="institute">
                            <p>Choose College/University</p>
                            <select name="institution" class="form-select">
                                <option selected>Select institution</option>
                                @foreach($educations as $education)
                                @if ($employeeId == $education->employee_id )
                                <option value="{{ $education->institution }}">{{ $education->institution }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="add-experience mt-5">
            <div class="row">
                <div class="d-flex">
                    <div class="col-sm-6">
                        <div class="company">
                            <p>Choose your late Experience</p>
                            <select name="experience" class="form-select">
                                <option selected>Select company</option>
                                @foreach($experiences as $experience)
                                @if ($employeeId == $experience->employee_id )
                                <option value="{{ $experience->company_name }}">{{ $experience->company_name }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="role">
                            <p>Choose your role</p>
                            <select name="designation" class="form-select">
                                <option selected>Select designation</option>
                                @foreach($experiences as $experience)
                                @if ($employeeId == $experience->employee_id )
                                <option value="{{ $experience->role }}">{{ $experience->role }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="add-experience mt-5">
            <div class="row">
                <div class="col-sm-12">
                    <div class="list-dates">
                        <p>Cover letter</p>
                        <textarea name="cover_letter" class="form-control" ></textarea>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-sm-6 mt-5">
            <div class="d-flex justify-content-between">
                <a href=" {{ route('employee.apply.job', ['id'=>$job->id]) }} " class="btn btn-primary">Submit</a>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </div>


</div>

@endsection

<script>
    const uploadBox = document.getElementById('uploadBox');
    const cvInput = document.getElementById('cvInput');
    const browseTrigger = document.getElementById('browseTrigger');

    // Trigger file dialog on click
    uploadBox.addEventListener('click', () => cvInput.click());
    browseTrigger.addEventListener('click', (e) => {
        e.stopPropagation();
        cvInput.click();
    });

    // Handle drag events
    uploadBox.addEventListener('dragover', (e) => {
        e.preventDefault();
        uploadBox.style.borderColor = '#007bff';
    });

    uploadBox.addEventListener('dragleave', () => {
        uploadBox.style.borderColor = '#ccc';
    });

    uploadBox.addEventListener('drop', (e) => {
        e.preventDefault();
        uploadBox.style.borderColor = '#ccc';
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            cvInput.files = files;
            handleFile(files[0]);
        }
    });

    // Handle file input change
    cvInput.addEventListener('change', () => {
        if (cvInput.files.length > 0) {
            handleFile(cvInput.files[0]);
        }
    });

    function handleFile(file) {
        if (file.type !== "application/pdf") {
            alert("Please upload a PDF file.");
            return;
        }
        uploadBox.querySelector("p").textContent = `Selected file: ${file.name}`;
    }
</script>
