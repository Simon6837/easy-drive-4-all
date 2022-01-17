<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()     
    {
        $cars = Cars::All();
        return view('pages.website.cars', compact('cars'));
    }
}
