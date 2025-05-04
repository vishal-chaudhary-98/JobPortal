<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Certification;
use App\Models\EmployeeProfile;
use Illuminate\Support\Facades\Auth;
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
            return redirect()->back()->with('success', 'validation success');
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
}
