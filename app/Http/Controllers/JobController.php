<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;


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
            'type' => 'required|string|max:50',
        ]);
        $post = new Job();
        $post->title = $request->title;
        $post->location = $request->location;
        $post->description = $request->description;
        $post->salary = $request->salary;
        $post->type = $request->type;
        $post->employer_id = $employer->id;
        $post->created_at = now();
        $post->save();

        return redirect()->back()->with('success', 'Job posted successfully!');
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
}
