<?php

namespace App\Http\Controllers;

use App\Models\Text;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $data = Text::all()->where('page', '=', 'about-us');
        return view('pages.website.aboutus', compact('data'));
    }
}
