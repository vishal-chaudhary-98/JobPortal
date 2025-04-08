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
        Auth::login($user);
        return redirect()->route('employee.dashboard')->with('success', 'Welcome ' . $user->name . '!');
    }

    //Logout function
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('employee.login');
    }
}
