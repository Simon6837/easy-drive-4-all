<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        if ($request->user()->hasRole('instructor')) {
            return $this->instructorProfile();
        }
        if ($request->user()->hasRole('student')) {
            return $this->studentProfile();
        }
    }

    private function instructorProfile()
    {
        return view('/pages.instructors.profile');
    }

    private function studentProfile()
    {
        return view('/pages.students.profile');
    }
}
