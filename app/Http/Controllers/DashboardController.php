<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Absence;
use App\Models\Cars;
use App\Models\User;
use App\Models\Lesson;
use Illuminate\Http\Request;
use App\Models\Notifications;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if ($request->user()->hasRole('owner')) {
            return $this->ownerDashboard();
        }
        if ($request->user()->hasRole('instructor')) {
            return $this->instructorDashboard($request->user());
        }
        if ($request->user()->hasRole('student')) {
            return $this->studentDashboard();
        }
    }

    private function ownerDashboard()
    {
        $now = Carbon::now();
        $nextWeek = Carbon::now()->addWeek();
        $data = [
            'studentCount' => User::has('student')->with('student')->get()->where('active', '=', 1)->count(),
            'instructorCount' => User::has('instructor')->with('instructor')->get()->where('active', '=', 1)->count(),
            'carCount' => Cars::count(),
            'notificationCount' => Notifications::whereBetween('valid_until', [$now, $nextWeek])->count(),
            'lessonsCount' => Lesson::count(),
            'absenceCount' => Absence::all()->where('end_date', null)->count(),
        ];
        return view('pages.dashboards.owner.index', compact('data'));
    }

    private function instructorDashboard($user)
    {
        $user_id = Auth::id();
        $instructor = DB::table('users')
        ->join('instructors', 'users.id', '=', 'instructors.user_id')
        ->where('instructors.user_id', '=', $user_id)
        ->select('instructors.id')
        ->first();

        $instructor_id = $instructor->id;
        $now = Carbon::now();
        $nextWeek = Carbon::now()->addWeek();
        $data = [
            'notificationCount' => Notifications::whereBetween('valid_until', [$now, $nextWeek])->where('role', '=', 'instructeur')->count(),
            'lessonsCount' => Lesson::where('instructor_id', '=', $instructor_id)->count(),
            'absenceCount' => Absence::all()->where('end_date', null)->where('instructor_id', '=', $user->instructor->id)->count(),
        ];
        return view('pages.dashboards.instructor.index', compact('data'));
    }

    private function studentDashboard()
    {
        $user_id = Auth::id();
        $student = DB::table('users')
        ->join('students', 'users.id', '=', 'students.user_id')
        ->where('students.user_id', '=', $user_id)
        ->select('students.id')
        ->first();

        $sudent_id = $student->id;
        $now = Carbon::now();
        $nextWeek = Carbon::now()->addWeek();
        $data = [
            'notificationCount' => Notifications::whereBetween('valid_until', [$now, $nextWeek])->where('role', '=', 'leerling')->count(),
            'lessonsCount' => Lesson::where('student_id', '=', $sudent_id)->count(),
        ];
        return view('pages.dashboards.student.index', compact('data'));
    }
}
