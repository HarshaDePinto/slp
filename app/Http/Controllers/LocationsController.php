<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Vehicle;
use App\Duty;
use App\User;
use App\Location;

class LocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::all();
        if ($locations) {
            return view('locations.index')->with('locations', $locations);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Location::all();
        $user = Auth::user();
        $tours = Duty::all();
        $vehicles = Vehicle::all();
        if ($locations) {

            return view('locations.create', compact('locations', 'user', 'tours', 'vehicles'));
        } else {
            return view('locations.create', compact('user', 'tours', 'vehicles'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $location = Location::create($input);
        $tour = Duty::find($input['tour']);
        $location->duties()->save($tour);
        $vehicle = Vehicle::find($tour->vehicle_id);
        $vehicle->location = $input['location'];


        $vehicle->cMilage = $input['c_meter'];

        $vehicle->save();
        session()->flash('success', 'Location Added Successfully!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
