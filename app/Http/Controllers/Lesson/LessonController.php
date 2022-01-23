<?php

namespace App\Http\Controllers\Lesson;

use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Instructor;
use Illuminate\Support\Facades\Auth;


class LessonController extends Controller
{    

    // Fetch all data
    public function index(Request $request)     
    {
        if ($request->user()->hasRole('owner')) {
            return $this->ownerLessons();
        }
        if ($request->user()->hasRole('instructor')) {
            return $this->instructorLessons();
        }
        if ($request->user()->hasRole('student')) {
            return $this->studentLessons();
        }

    }

    private function ownerLessons()
    {
        $all_students = DB::table('users')
        ->join('students', 'students.user_id', '=', 'users.id')
        ->select('students.id', 'users.first_name', 'users.last_name')
        ->get();

        $lessons = array();
        $all_lessons = Lesson::All();
        foreach($all_lessons as $lesson){
            $lessons[] = [
                'id' => $lesson->id,
                'start' => $lesson->start_date,
                'end' => $lesson->end_date,
            ];
        }
        return view('pages.lesson.lesson', compact('lessons', 'all_students'));
    }
    private function instructorLessons()
    {
        $user_id = Auth::id();

        $instructor_id = DB::table('users')
        ->join('instructors', 'users.id', '=', 'instructors.user_id')
        ->where('instructors.user_id', '=', $user_id)
        ->select('instructors.id')
        ->first();

        $all_students = DB::table('users')
        ->join('students', 'students.user_id', '=', 'users.id')
        ->select('students.id', 'users.first_name', 'users.last_name')
        ->get();

        $lessons = array();
        $all_lessons = Lesson::where('instructor_id', '=', $instructor_id->id)->get();
        foreach($all_lessons as $lesson){
            $lessons[] = [
                'id' => $lesson->id,
                'start' => $lesson->start_date,
                'end' => $lesson->end_date,
            ];
        }
        return view('pages.lesson.lesson', compact('lessons', 'all_students'));
    }
    private function studentLessons()
    {
        $all_students = DB::table('users')
        ->join('students', 'students.user_id', '=', 'users.id')
        ->select('students.id', 'users.first_name', 'users.last_name')
        ->get();

        $lessons = array();
        $all_lessons = Lesson::All();
        foreach($all_lessons as $lesson){
            $lessons[] = [
                'id' => $lesson->id,
                'start' => $lesson->start_date,
                'end' => $lesson->end_date,
            ];
        }
        return view('pages.lesson.lesson', compact('lessons', 'all_students'));
    }
    // CRUD FUNCTION
    public function option(Request $request)
    {
        $user_id = Auth::id();

        $instructor_id = DB::table('users')
        ->join('instructors', 'users.id', '=', 'instructors.user_id')
        ->where('instructors.user_id', '=', $user_id)
        ->select('instructors.id')
        ->first();

        $start = $request->start_date;
        $end = $request->end_dat;

        $same_time = Lesson::whereBetween('start_date', [$start, $end])
                            ->whereBetween('end_date', [$start, $end])
                            ->first();

        if($request->ajax()){

            // Add new lesson
            if($request->type == 'add')
            {
                if(!$same_time){
                    $new_lesson = Lesson::create([
                        'instructor_id' => $instructor_id->id,
                        'student_id' => $request->student,
                        'pickup_address' => $request->adress,
                        'pickup_postal_code' => $request->postcode,
                        'pickup_city' => $request->city,
                        'goal' => $request->goal,
                        'start_date' => $request->start_date,
                        'end_date' => $request->end_date,
                    ]);
                    // return response()->json($new_lesson);
                    if ($new_lesson){
                        return response()->json([
                            'new_lesson' => $new_lesson,
                            'status' => true,
                            'message' => 'Nieuw les toegevoged!',
                        ]);
                    }
                    else {
                        return response()->json(array(
                            'status' => false,
                            'message' => 'Probeer op nieuw!',
                        ));
                    }
                }
                else
                {
                    return response()->json([
                        'status' => 'same',
                        'message' => 'Jij heeft een les op hetzelfde tijd!',
                    ]);
                }
                return $request;
            }

            // Find the lesson id
            if($request->type == 'edit')
            {
                $lesson = Lesson::find($request->id);

                $student_naam = DB::table('lessons')
                ->join('students', 'lessons.student_id', '=', 'students.id')
                ->join('users', 'students.user_id', '=', 'users.id')
                ->where('lessons.id', '=', $lesson->id)
                ->select('users.first_name', 'users.last_name')
                ->first();

                $student_firstName = $student_naam->first_name;
                $student_lastName = $student_naam->last_name;

                return response()->json([
                    'student_firstName' => $student_firstName,
                    'student_lastName' => $student_lastName,
                    'lesson' => $lesson
                ]);
            }

            // Update les data
            if($request->type == 'update')
            {
                $lessons = Lesson::find($request->id);
                $lessons->pickup_address = $request->adress;
                $lessons->pickup_postal_code = $request->postcode;
                $lessons->pickup_city = $request->city;
                $lessons->goal = $request->goal;
                $lessons->start_date = $request->start_date;
                $lessons->end_date = $request->end_date;
                $lessons->result = $request->result;
                $lessons->comment = $request->comment;
                $lessons->update();

                if ($lessons){
                    return response()->json([
                        'status' => true,
                        'message' => 'Les is gewijzigd!',
                    ]);
                }
                else {
                    return response()->json(array(
                        'status' => false,
                        'message' => 'Probeer op nieuw!',
                    ));
                }
            }

            // Delete the lesson
            if($request->type == 'delete')
            {
                $les = Lesson::find($request->id)->delete();
                return response()->json($les);
            }
            
        }
    }
}
