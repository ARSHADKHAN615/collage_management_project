<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function index()
    {
        $userData = User::find(Auth::user()->id)->student;
        $courseData = User::find(Auth::user()->id)->student->course;
        return view('pages.profile', compact('userData', 'courseData'));
    }
}
