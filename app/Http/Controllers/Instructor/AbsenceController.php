<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Absence;
use App\Models\Instructor;
use App\Models\Notifications;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AbsenceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ownerIndex()
    {

        $absences = Absence::All();
        $data = [];
        foreach ($absences as $absence)
        {
            $instructor = Instructor::find($absence['instructor_id']);
            $user = User::find($instructor['user_id']);
            $absence['name'] = $user['first_name'].' '.$user['prefix'].' '.$user['last_name'];
            array_push($data, $absence);
        }


        return view('pages.owner.absence.index', compact('data'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Active(request $request)
    {
        $instructor_id = $request->user()->instructor->id;
        $now = Carbon::now()->addHour();
        $activeAbsences = Absence::All()
            ->where('end_date', null)
            ->where('instructor_id', $instructor_id);

        $pastAbsences = Absence::All()
            ->where('instructor_id', $instructor_id);

        return view('pages.instructors.absence.active', compact('activeAbsences', 'pastAbsences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     *  @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('pages.instructors.absence.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'reason' => 'required',
            'start_date' => 'required',
            'end_date' => 'sometimes',
        ]);

        $data['instructor_id'] = $request->user()->instructor->id;

        Absence::create($data);

        return redirect()->route('activeabsences')
            ->with('success', 'Je ziektemelding is toegevoegd.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $absence = Absence::find((int)$id);
        return view('pages.instructors.absence.edit', compact('absence'));
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
            'reason' => 'required',
            'end_date' => 'sometimes',
        ]);
        $data['instructor_id'] = $request->user()->instructor->id;

        $absence = Absence::find($request->id);
        $absence->update($data);

        return redirect()->route('activeabsences')
            ->with('success', 'Je ziekmelding is bijgewerkt');
    }
}
