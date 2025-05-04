<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\JobType;
use Illuminate\Support\Facades\Auth;


class JobController extends Controller
{
    public function store(Request $request)
    {
        $employer = auth('employer')->user();
        if (!$employer) {
            abort(403, 'Unauthorized');
        }
        $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'salary' => 'nullable|numeric',
            'job_type' => 'required',
        ]);
        $post = new Job();
        $job_type = new JobType();
        $post->title = $request->title;
        $post->location = $request->location;
        $post->description = $request->description;
        $post->salary = $request->salary;
        $post->type = $request->job_type;
        $post->employer_id = $employer->id;
        $post->created_at = now();
        $post->save();

        return redirect()->back()->with('success', 'Job posted successfully!');
    }

    public function updateForm($id) {
        $field = Job::findOrFail($id);
        $jobType = JobType::all();
        return view('employer.auth.layout.sections.update_job', compact(['field','jobType']));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'salary' => 'nullable|numeric',
            'job_type' => 'required',
        ]);
        $update = Job::findOrFail($id);

        $update->title = $request->title;
        $update->location = $request->location;
        $update->description = $request->description;
        $update->salary = $request->salary;
        $update->type = $request->job_type;

        // Save the updated job
        $update->save();
        return view('employer.auth.dashboard')->with('success','Post updated sucessfully!');
    }

    public function showJobs(Request $request)
    {
        // $jobs = Job::where('employer_id', auth('employer')->id())->latest()->get();
        // return view('employer.auth.dashboard', compact('jobs'));
        $jobs = Job::with('employer')
            ->where('employer_id', auth('employer')->id())
            ->latest()
            ->get();

        return view('employer.auth.layout.sections.listJobs', compact('jobs'));
    }

    public function jobForEmployee() {
        if(!Auth::guard('web')->user()) {
            return redirect()->route('employee.login');
        }
        $jobs = Job::all();
        return view('employee.auth.layout.sections.main_content', compact('jobs'));
    }

    public function yourJobs(Request $request)
    {
        $employer = auth('employer')->user();
        if (!$employer) {
            abort(403, 'Unauthorized');
        }
        $jobs = Job::with('employer')
            ->where('employer_id', $employer->id)
            ->latest()
            ->get();
        return view('employer.auth.dashboard', compact('jobs'));
    }

    //View Single job post
    public function singleJobPost(Request $request) {
        $employer = auth('employer')->user();
        if (!$employer) {
            abort(403, 'Unauthorezed');
        }
        dd ($request);
    }
}
