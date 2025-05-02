<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Education;
use App\Models\Experience;
use App\Models\EmployeeProfile;
use Illuminate\Support\Facades\Auth;

class PersonalDetailsController extends Controller
{
    protected $userId;

    public function __construct() {
        $this->userId = auth()->id();
    }

    public function index(Request $request) {
        dd($request);
    }
}
