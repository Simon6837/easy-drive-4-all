<?php

namespace App\Http\Controllers\owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\instructorRequest;
use App\Models\Instructor;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    public function index()
    {
        $instructors = User::has('instructor')->with('instructor')->get()->where('active', '=', 1);;
        return view('pages.owner.instructors.index', compact('instructors'));
    }

    public function create()
    {
        return view('pages.owner.instructors.create');
    }

    public function store(instructorRequest $request)
    {
        $this->validate($request, [
            'password' => 'required|string',
        ]);

        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        $data['user_id'] = $user->id;
        if ($image = $request->file('image')) {
            $destinationPath = 'assets/images/instructors';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['image'] = "$profileImage";
        }
        Instructor::create($data);
        $user->attachRole('instructor');

        return redirect()->route('instructorsindex')->with('success', 'De instructeur is aangemaakt');
    }

    public function edit($id)
    {
        $user = User::where('id', $id)->with('instructor')->get()->first();
        return view('pages.owner.instructors.edit', compact('user'));
    }

    public function update(instructorRequest $request)
    {
        $data = $request->all();
        $user = User::find($data['id']);

        $user->first_name = $data['first_name'];
        $user->prefix = $data['prefix'];
        $user->last_name = $data['last_name'];
        $user->email = $data['email'];
        $user->instructor->address = $data['address'];
        $user->instructor->city = $data['city'];
        $user->instructor->postal_code = $data['postal_code'];
        $user->instructor->description = $data['description'];
        if ($image = $request->file('image')) {
            $destinationPath = 'assets/images/instructors';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $user->instructor->image = "$profileImage";
        }
        $user->save();
        $user->instructor->save();
        return redirect()->route('instructorsindex')->with('success', 'De instructeur is aangepast');
    }

    public function destroy($id)
    {
        foreach (explode(",", $id) as $value) 
        {
            $currentTime = Carbon::now();
            $user = User::find($value);
            $user->first_name = 'deleted';
            $user->prefix = '';
            $user->last_name = '';
            $user->email = $currentTime->toDateTimeString().$value;
            $user->active = 0;
            $user->instructor->address = 'deleted';
            $user->instructor->city = 'deleted';
            $user->instructor->postal_code = 'deleted';
            $user->instructor->description = 0;
            $user->instructor->image = '';
            $user->save();
            $user->instructor->save();
        }

        return redirect()->route('instructorsindex')
            ->with('success', 'De instructeur is verwijderd');
    }
}
