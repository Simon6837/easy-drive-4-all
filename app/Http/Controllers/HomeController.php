<?php

namespace App\Http\Controllers;

use App\Http\Requests\signupRequest;
use App\Mail\signup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function signup(signupRequest $request)
    {
        $data = $request->all();
        Mail::to(env("OWNER_MAIL"))->send(new signup($data));
        return 'hi';
    }
}
