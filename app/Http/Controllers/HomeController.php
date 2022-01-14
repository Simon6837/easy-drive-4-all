<?php

namespace App\Http\Controllers;

use App\Http\Requests\signupRequest;
use App\Mail\signup;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function signup(signupRequest $request)
    {
        return new signup();
    }
}
