<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;


class JobController extends Controller
{
    public function store(Request $request) {
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
    $post->employer_id = $employer->id;
    $post->save();

    return redirect()->back()->with('success', 'Job posted successfully!');

}
}
