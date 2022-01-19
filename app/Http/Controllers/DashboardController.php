<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\Notifications;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if ($request->user()->hasRole('owner')) {
            return $this->ownerDashboard();
        }
        if ($request->user()->hasRole('instructor')) {
            return $this->instructorDashboard();
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
        ];
        return view('pages.dashboards.owner.index', compact('data'));
    }

    private function instructorDashboard()
    {
        $now = Carbon::now();
        $nextWeek = Carbon::now()->addWeek();
        $data = [
            'notificationCount' => Notifications::whereBetween('valid_until', [$now, $nextWeek])->where('role', '=', 'instructeur')->count(),
        ];
        return view('pages.dashboards.instructor.index', compact('data'));
    }

    private function studentDashboard()
    {
        $now = Carbon::now();
        $nextWeek = Carbon::now()->addWeek();
        $data = [
            'notificationCount' => Notifications::whereBetween('valid_until', [$now, $nextWeek])->where('role', '=', 'leerling')->count(),
        ];
        return view('pages.dashboards.student.index', compact('data'));
    }
}
