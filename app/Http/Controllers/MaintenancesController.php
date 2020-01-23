<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Fuel;
use App\Vehicle;
use App\Duty;
use App\Finance;
use App\User;
use App\Location;
use App\Maintenance;

use Illuminate\Http\Request;

class MaintenancesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $maintenances = Maintenance::all();
        $user = Auth::user();
        $tours = Duty::all();
        $vehicles = Vehicle::all();
        if ($maintenances) {

            return view('maintenances.create', compact('maintenances', 'user', 'tours', 'vehicles'));
        } else {
            return view('maintenances.create', compact('user', 'tours', 'vehicles'));
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
        $maintenance = Maintenance::create($input);
        $vehicle = Vehicle::find($maintenance->vehicle);
        $maintenance->vehicles()->save($vehicle);
        $tour = Duty::find($maintenance->tour);

        session()->flash('success', 'Maintenance Added Successfully!');
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
