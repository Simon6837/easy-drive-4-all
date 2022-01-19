<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Instructor;
use App\Models\User;
use App\Models\Student;
use App\Models\Cars;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generateCarsPDF()
    {
        $data = [
            'title' => 'Overzicht van alle voertuigen',
            'date' => Carbon::now()->addHour(),
            'cars' => Cars::All(),
        ];

        $pdf = PDF::loadView('pdf/carsPDF', $data);

        return $pdf->download('cars.pdf');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generateInstructorsPDF()
    {
        $data = [
            'title' => 'Overzicht van alle instructeurs',
            'date' => Carbon::now()->addHour(),
            'instructors' => User::has('instructor')->with('instructor')->get()->where('active', '=', 1),
        ];

        $pdf = PDF::loadView('pdf/instructorsPDF', $data);

        return $pdf->download('instructors.pdf');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generateStudentsPDF()
    {
        $data = [
            'title' => 'Overzicht van alle studenten',
            'date' => Carbon::now()->addHour(),
            'students' => User::has('student')->with('student')->get()->where('active', '=', 1),
        ];

        $pdf = PDF::loadView('pdf/studentsPDF', $data);

        return $pdf->download('students.pdf');
    }
}
