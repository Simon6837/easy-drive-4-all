<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Notifications;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = Notifications::All();

        return view('pages.owner.notifications.index', compact('notifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.owner.notifications.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $this->validate($request, [
            'role' => 'required',
            'title' => 'required',
            'notification' => 'required',
            'valid_until' => 'required',
        ]);


        Notifications::create($validation);

        return redirect()->route('notifications')
            ->with('success', 'De melding is toegevoegd.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notification = Notifications::find((int)$id);
        return view('pages.owner.notifications.edit', compact('notification'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->validate([
            'role' => 'required',
            'title' => 'required',
            'notification' => 'required',
            'valid_until' => 'required',
        ]);
        $notification = Notifications::find($request->id);

        $notification->update($data);

        return redirect()->route('notifications')
            ->with('success', 'De melding is geupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Vehicle $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        foreach (explode(",", $id) as $value) 
        {         
            $notification = Notifications::find($value);
            $notification->delete();
        }

        return redirect()->route('notifications')
            ->with('Success', 'De melding is verwijderd');
    }

    public function getFromRole(Request $request)
    {
        if ($request->user()->hasRole('owner')) {
            return $this->index();
        }
        if ($request->user()->hasRole('instructor')) {
            return $this->instructorNofitifcations();
        }
        if ($request->user()->hasRole('student')) {
            return $this->studentNofitifcations();
        }
    }

    private function currentNofitifcations()
    {
        $now = Carbon::now();
        $nextWeek = Carbon::now()->addWeek();

        $notifications = Notifications::whereBetween('valid_until', [$now, $nextWeek])->get();

        return view('pages.owner.notifications.active', compact('notifications'));

    }

    private function studentNofitifcations()
    {
        $now = Carbon::now();
        $nextWeek = Carbon::now()->addWeek();

        $notifications = Notifications::whereBetween('valid_until', [$now, $nextWeek])->where('role', '=', 'leerling')->get();

        return view('pages.student.notifications', compact('notifications'));

    }

    private function instructorNofitifcations()
    {
        $now = Carbon::now();
        $nextWeek = Carbon::now()->addWeek();

        $notifications = Notifications::whereBetween('valid_until', [$now, $nextWeek])->where('role', '=', 'instructeur')->get();

        return view('pages.instructors.notifications', compact('notifications'));

    }
}
