<?php

namespace App\Http\Controllers\Owner;

use App\Http\Requests\carsRequest;
use App\Http\Requests\studentRequest;
use App\Models\Cars;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Cars::All();

        return view('pages.owner.cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.owner.cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(carsRequest $request)
    {
        $data = $request->all();

        if ($image = $request->file('image')) {

            $destinationPath = 'assets/images/cars';

            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();

            $image->move($destinationPath, $profileImage);

            $data['image'] = "$profileImage";
        }

        Cars::create($data);

        return redirect()->route('carsindex')
            ->with('success', 'Het voertuig is toegevoegd.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Cars $cars
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Cars::find((int)$id);
        return view('pages.owner.cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Cars $cars
     * @return \Illuminate\Http\Response
     */
    public function update(carsRequest $request)
    {
        $data = $request->all();

        $car = Cars::find($request->id);
        if ($image = $request->file('image')) {

            $destinationPath = 'assets/images/cars';

            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();

            $image->move($destinationPath, $profileImage);

            $data['image'] = "$profileImage";
        } else {
            unset($data['image']);
        }
        $car->update($data);

        return redirect()->route('carsindex')
            ->with('success', 'Het voertuig is aangepast');
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
            $car = Cars::find($value);
            $car->delete();
        }

        return redirect()->route('carsindex')
            ->with('Success', 'Auto is verwijderd');
    }
}
