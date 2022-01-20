<?php

namespace App\Http\Controllers;

use App\Http\Requests\signupRequest;
use App\Mail\signup;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        $instructors = User::has('instructor')->with('instructor')->get()->where('active', '=', 1);;
        return view('pages.website.home', compact('instructors'));
    }

    public function signup(signupRequest $request)
    {
        $data = $request->all();
        Mail::to(env("OWNER_MAIL"))->send(new signup($data));
        return redirect('/#signup')->with('success', 'Je aanmelding is verstuurd.');
    }
}
