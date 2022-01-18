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

        return redirect()->route('notificationsindex')
            ->with('Goood', 'Het voertuig is toegevoegd.');
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

        return redirect()->route('notificationsindex')
            ->with('Success', 'De melding is geupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Vehicle $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notification = Notifications::find($id);
        $notification->delete();

        return redirect()->route('notificationsindex')
            ->with('Success', 'De melding is verwijderd');
    }

    public function currentNofitifcations()
    {
//        $now = date("Y-m-d H:i:s");
//        dd($now);
//        $data = strtotime($now);
//        $nextWeek = date_add($data, date_interval_create_from_date_string('7 days'));

        $now = Carbon::now();
        $nextWeek = Carbon::now()->addWeek();

        $notifications = Notifications::whereBetween('valid_until', [$now, $nextWeek])->get();

        return view('pages.owner.notifications.active', compact('notifications'));

    }
}
