<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\studentRequest;
use App\Models\Student;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = User::has('student')->with('student')->get()->where('active', '=', 1);

        return view('pages.owner.students.index', compact('students'));
    }

    public function create()
    {
        return view('pages.owner.students.create');
    }

    public function store(studentRequest $request)
    {
        $this->validate($request, [
            'password' => 'required|string',
        ]);
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        $data['user_id'] = $user->id;
        Student::create($data);
        $user->attachRole('student');
        return redirect()->route('studentindex')->with('success', 'De leerling is aangemaakt');
    }

    public function edit($id)
    {
        $user = User::where('id', $id)->with('student')->get()->first();
        return view('pages.owner.students.edit', compact('user'));
    }

    public function update(studentRequest $request)
    {
        $data = $request->all();
        $user = User::find($data['id']);

        $user->first_name = $data['first_name'];
        $user->prefix = $data['prefix'];
        $user->last_name = $data['last_name'];
        $user->email = $data['email'];
        $user->student->address = $data['address'];
        $user->student->city = $data['city'];
        $user->student->postal_code = $data['postal_code'];
        $user->student->lessons_to_go = $data['lessons_to_go'];
        $user->save();
        $user->student->save();
        return redirect()->route('studentindex')->with('success', 'De leerling is aangepast');
    }

    public function destroy($id)
    {
        foreach (explode(",", $id) as $value) 
        {
            $currentTime = Carbon::now();
            $user = User::find($id);
            $user->first_name = 'deleted';
            $user->prefix = '';
            $user->last_name = '';
            $user->email = $currentTime->toDateTimeString().$value;
            $user->active = 0;
            $user->student->address = 'deleted';
            $user->student->city = 'deleted';
            $user->student->postal_code = 'deleted';
            $user->student->lessons_to_go = 0;
            $user->save();
            $user->student->save();
        }

        return redirect()->route('studentindex')
            ->with('Success', 'Student is verwijderd');
    }
}
