<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class EmployerController extends Controller
{
    //Registration method
    public function index(Request $request) {
        $request->validate ([
            'name' => 'required|string|min:5|max:50',
            'companyName' => 'required|string|min:5|max:50',
            'description' => 'nullable|string|max:500',
            'address' => 'required|string|max:250',
            'contact' => 'required|digits_between:10,12',
            'email' => 'required|string|unique:employers,email',
            'companyDescription' => 'required|string|max:500',
            'pswd' => 'required|string|max:35|same:cpswd',
            'cpswd' => 'required|string|max:35',
        ]);
        $user = new Employer();
        $user->name = $request->name;
        $user->company_name = $request->companyName;
        $user->description = $request->description;
        $user->address = $request->address;
        $user->contact = $request->contact;
        $user->email = $request->email;
        $user->company_description = $request->companyDescription;
        $user->password = Hash::make($request->pswd);
        $registred = $user->save();
        if (!$registred) {
            return redirect()->back()->withErrors(['error'=>'Unable to register!']);
        }
        return redirect()->route('employer.login')->with('success','Registred sucessfully!');
    }

    //Login method
    public function login(Request $request) {
        $request->validate([
            'email' => 'required|string|min:5|max:35',
            'pswd' => 'required|string|min:5|max:35',
        ]);
        $user = Employer::where('email', $request->email)->first();
        if (!$user) {
            return redirect()->back()->withErrors(['email' => 'Email not found!']);
        }
        if (!Hash::check($request->pswd, $user->password)) {
            return redirect()->back()->withErrors(['pswd' => 'Passowrd not match!']);
        }
        Auth::login($user);
        return redirect()->route('employer.dashboard')->with('success','Welcome '.$user->name.'!');
    }

    public function update(Request $request) {

    }

    //Logout method
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('employer.login');
    }
}
