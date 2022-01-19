<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        if ($request->user()->hasRole('instructor')) {
            $user = $request->user();
            $response = view('/pages.instructors.profile', compact('user'));
        }
        if ($request->user()->hasRole('student')) {
            $user = $request->user();
            $response = view('/pages.student.profile', compact('user'));
        }
        return $response;
    }

}
