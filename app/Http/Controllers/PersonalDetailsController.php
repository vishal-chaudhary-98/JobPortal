<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Certification;
use App\Models\Employee;
use App\Models\EmployeeProfile;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class PersonalDetailsController extends Controller
{

    public function index(Request $request)
    {
        $employeeId = auth()->id();
        try {
            $this->validateEducation($request);
            $this->validateCertification($request);
            $this->validateExperience($request);

            $this->profile($request, $employeeId);
            $this->storeEducation($request, $employeeId);
            $this->storeCertification($request, $employeeId);
            $this->storeExperience($request, $employeeId);
            // dd($request);
            return redirect()->back()->with('success', 'Personal details uploaded Successfully!');
        } catch (ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        }
    }

    protected function profile(Request $request, $employeeId)
    {
        $request->validate([
            'bio' => 'required|string|max:300',
            'skills' => 'required|string|max:255',
            'linkedin' => 'required|string|max:255',
            'github' => 'required|string|max:255',
        ]);
        // dd($request);die();
        EmployeeProfile::create([
            'employee_id' => $employeeId,
            'bio' => $request->bio,
            'skills' => $request->skills,
            'linkedin' => $request->linkedin,
            'github' => $request->github,

        ]);
    }

    // For Education
    protected function validateEducation(Request $request)
    {
        if (! auth('web')->user()) {
            abort(403, 'Unauthorized');
        }
        $request->validate([
            'education.degree.*' => 'required|string|max:255',
            'education.institution.*' => 'required|string|max:255',
            'education.year.*' => 'required|integer|between:1980,' . date('Y'),
        ], [
            'education.degree.*.required' => 'The degree field is required',
            'education.institution.*.required' => 'The institution field is required',
            'education.year.*.required' => 'The year field is required',
        ]);
    }

    protected function storeEducation($request, $employeeId)
    {
        $degrees = $request->input('education.degree');
        $institute = $request->input('education.institution');
        $year = $request->input('education.year');
        foreach ($degrees as $index => $degree) {
            Education::create([
                'employee_id' => $employeeId,
                'degree' => $degree,
                'institution' => $institute[$index],
                'year' => $year[$index],
            ]);
        }
    }

    //For Certification
    protected function validateCertification(Request $request)
    {
        $request->validate([
            'certificate.course.*' => 'required|string|max:255',
            'certificate.institute.*' => 'required|string|max:255',
            'certificate.certificate_date.*' => 'required|date',
        ], [
            'certificate.course.*.required' => 'The course field is required',
            'certificate.institute.*.required' => 'The institute field is required',
            'certificate.certificate_date.*.required' => 'The certificate issue date is required',
        ]);
    }

    protected function storeCertification($request, $employeeId)
    {
        $courses = $request->input('certificate.course');
        $institute = $request->input('certificate.institute');
        $certification_date = $request->input('certificate.certificate_date');
        foreach ($courses as $index => $course) {
            Certification::create([
                'employee_id' => $employeeId,
                'name' => $course,
                'institution' => $institute[$index],
                'date_received' => $certification_date[$index],
            ]);
        }
    }

    protected function validateExperience(Request $request) {
        $request->validate([
            'experience.company.*' => 'required|string|max:255',
            'experience.role.*' => 'required|string|max:255',
            'experience.start_date.*' => 'required|date',
            'experience.end_date.*' => 'required|date'
        ],  [
            'experience.company.*.required' => 'Company name is required',
            'experience.role.*.required' => 'Designation is required',
            'experience.start_date.*.required' => 'Starting date is required',
            'experience.end_date.*.required' => 'End date is required'
        ]);
    }

    protected function storeExperience($request, $employeeId) {
        $companys = $request->input('experience.company');
        $role = $request->input('experience.role');
        $start_date = $request->input('experience.start_date');
        $end_date = $request->input('experience.end_date');
        foreach($companys as $index => $company) {
        Experience::create([
                'employee_id' => $employeeId,
                'company_name' => $company,
                'role' => $role[$index],
                'start_date' => $start_date[$index],
                'end_date' => $end_date[$index]
        ]);
        }
    }

    //Show personal details
    public function show() {
        $employeeId = auth()->id();
        $employeeProfile = $this->employeeProfile($employeeId);
        $employeeEducation = $this->employeeEducation($employeeId);
        $employeeCertification = $this->employeeCertification($employeeId);
        $employeeExperience = $this->employeeExperience($employeeId);


        // if (!$employeeProfile || !$employeeEducation || !$employeeCertification || !$employeeExperience) {
        //     return view('employee.auth.layout.sections.view_profile');
        // }
        return view('employee.auth.layout.sections.view_profile', [
            'profile' => $employeeProfile,
            'educations' => $employeeEducation,
            'certifications' => $employeeCertification,
            'experiences' => $employeeExperience
        ]);
    }

    protected function employeeProfile($employeeId) {
        return EmployeeProfile::where('employee_id', $employeeId)->first();
    }

    protected function employeeEducation($employeeId) {
        return Education::where('employee_id' , $employeeId)->get();
    }

    protected function employeeCertification($employeeId) {
        return Certification::where('employee_id', $employeeId)->get();
    }

    protected function employeeExperience($employeeId) {
        return Experience::where('employee_id', $employeeId)->get();
    }

    //Update Qualification
    public function updateEducation(Request $request) {
        $employeeId = auth()->id();
        $degrees = $request->input('education.degree');
        $institute = $request->input('education.institution');
        $year = $request->input('education.year');

        $educationRecord = $this->employeeEducation($employeeId);

        foreach($degrees as $index => $degree) {
            $data = [
                'degree' => $degree,
                'institution' => $institute[$index] ?? null,
                'year' => $year[$index] ?? null,
            ];
            if (isset($educationRecord[$index])) {
                $educationRecord[$index]->update($data);
            }
        }
        return redirect()->back()->with('success','Data updated');
    }

    // Update Certification
    public function updateCertification(Request $request) {
        $employeeId = auth()->id();
        $courses = $request->input('certificate.course');
        $institute = $request->input('certificate.institute');
        $certificate_date = $request->input('certificate.certificate_date');

        $certificateRecord = $this->employeeCertification($employeeId);

        foreach($courses as $index => $course) {
            $data = [
                'name' => $course,
                'institution' => $institute[$index] ?? null,
                'date_received' => $certificate_date[$index] ?? null,
            ];
            if (isset($certificateRecord[$index])) {
                $certificateRecord[$index]->update($data);
            }
        }
        return redirect()->back()->with('success','Data updated');
    }

    // Update Experience
    public function updateExperience(Request $request) {
        $employeeId = auth()->id();
        $companys = $request->input('experience.company');
        $role = $request->input('experience.role');
        $start_date = $request->input('experience.start_date');
        $end_date = $request->input('experience.end_date');

        $experienceRecord = $this->employeeExperience($employeeId);

        foreach($companys as $index => $company) {
            $data = [
                'company_name' => $company,
                'role' => $role[$index] ?? null,
                'start_date' => $start_date[$index] ?? null,
                'end_date' => $end_date[$index] ?? null
            ];
            if (isset($experienceRecord[$index])) {
                $experienceRecord[$index]->update($data);
            }
        }
        return redirect()->back()->with('success','Data updated');
    }

    // Update Profile
    public function updateProfile(Request $request) {
        // dd($contact = $request->input('contact'));
        $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|string|max:255',
            'contact' => 'nullable|digits_between:10,12',
            'nationality' => 'nullable|string|max:255',
            'bio' => 'nullable|string|max:255',
            'skills' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'github' => 'nullable|string|max:255'
        ]);

        $employeeId = auth()->id();
        $name = $request->input('name');
        $email = $request->input('email');
        $contact = $request->input('contact');
        $nationality = $request->input('nationality');
        $bio = $request->input('bio');
        $skills = $request->input('skills');
        $linkedin = $request->input('linkedin');
        $github = $request->input('github');

        $employeeData = [
            'name' => $name,
            'email' => $email,
            'contact' => $contact,
            'nationality' => $nationality,
        ];

        $profileData = [
            'employee_id' => $employeeId,
            'bio' => $bio,
            'skills' => $skills,
            'linkedin' => $linkedin,
            'github' => $github
        ];

        $employeeDetail = Employee::findOrFail($employeeId);
        $employeeDetail->update($employeeData);

        $employeeProfile = EmployeeProfile::findOrFail($employeeId);
        $employeeProfile->update($profileData);

        return redirect()->back()->with('success','Employee details updated successfully!');
    }
}
