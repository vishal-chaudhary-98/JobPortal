<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    //Registration function
    public function index(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:4|max:15',
            'dob' => 'required|date',
            'gender' => 'required|string|in:male,female,other',
            'nationality' => 'required|string|max:20',
            'email' => 'required|email|min:10|max:35|unique:employees,email',
            'contact' => 'required|digits_between:10,12',
            'profile' => 'required|image|mimes:png,jpg,jpeg,gif|max:2048',
            'pswd' => 'required|string|min:5|max:35|same:cpswd',
            'cpswd' => 'required|string|min:5|max:35',
        ]);
        $imageName = null;
        if ($request->hasFile('profile')) {
            $image = $request->file('profile');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/profiles'), $imageName);
        }
        $employee = new Employee();
        $employee->name = $request->name;
        $employee->dob = $request->dob;
        $employee->gender = $request->gender;
        $employee->nationality = $request->nationality;
        $employee->email = $request->email;
        $employee->contact = $request->contact;
        $employee->profile = $imageName;
        $employee->password = Hash::make($request->pswd);
        if (!$employee->save()) {
            return redirect()->back()->withErrors(['error' => 'Unable to register!']);
        }
        return redirect()->route('employee.login')->with('success', 'You have registred sucessfully!');
    }
    //Login function
    public function login(Request $request)
    {
        if(!Auth::guard('employer')->check()) {
        $request->validate([
            'email' => 'required|string|min:5|max:35',
            'pswd' => 'required|string|min:5|max:35',
        ]);
        $user = Employee::where('email', $request->email)->first();
        if (!$user) {
            return redirect()->route('employee.login')->withErrors(['email' => 'Email not found']);
        }
        if (!Hash::check($request->pswd, $user->password)) {

            return redirect()->route('employee.login')->withErrors(['pswd' => 'Password not match!']);
        }
        Auth::guard('web')->login($user);
        return redirect()->route('employee.dashboard')->with('success', 'Welcome ' . $user->name . '!');
        }
    }

    public function showUpdateForm() {
        $employee = Employee::find(auth()->id());
        if(!$employee) {
            return redirect()->back()->withErrors(['error' => 'User not found!']);
        }
        return view('employee.auth.layout.sections.updateProfile', compact('employee'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|min:4|max:15',
            'dob' => 'nullable|date',
            'gender' => 'nullable|string|in:Male,Female,Other',
            'nationality' => 'nullable|string|max:20',
            'email' => 'nullable|email|min:10|max:35|unique:employees,email,' . auth()->id(),
            'contact' => 'nullable|digits_between:10,12',
            'profile' => 'nullable|image|mimes:png,jpg,jpeg,gif|max:2048',
        ]);

        $employee = Employee::find(auth()->id());
        if (!$employee) {
            return redirect()->back()->withErrors(['error' => 'Employee not found!']);
        }

        if ($request->hasFile('profile')) {
            $image = $request->file('profile');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/profiles'), $filename);

            if ($employee->profile && file_exists(public_path('uploads/profiles/' . $employee->profile))) {
                unlink(public_path('uploads/profiles/' . $employee->profile));
            }

            $employee->profile = $filename;
        }

        $employee->name = $request->name ?? $employee->name;
        $employee->dob = $request->dob ?? $employee->dob;
        $employee->gender = $request->gender ?? $employee->gender;
        $employee->nationality = $request->nationality ?? $employee->nationality;
        $employee->email = $request->email ?? $employee->email;
        $employee->contact = $request->contact ?? $employee->contact;

        $employee->save();

        return redirect()->route('employee.dashboard')->with('success', 'Details updated successfully!');
    }


    //Logout function
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('employee.login');
    }
}
