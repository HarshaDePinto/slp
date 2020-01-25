<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVehicleRequest;
use Illuminate\Http\Request;
use App\Vehicle;
use App\Image;
use App\Duty;
use App\Maintenance;
use Carbon\Carbon;

class VehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::orderBy('id', 'DESC')->get();
        $trashed = Vehicle::onlyTrashed()->get();
        $duties = Duty::all();

        return view('vehicles.index', compact('vehicles', 'duties', 'trashed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehicles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateVehicleRequest $request)
    {
        $input = $request->all();
        if ($file = $request->file('image_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);

            $image = Image::create(['path' => $name]);

            $input['image_id'] = $image->id;
        }

        $vehicle = Vehicle::create($input);
        $vehicle->cMilage = $input['sMilage'] + 1;
        $vehicle->save();
        session()->flash('success', $vehicle->name . ' Added Successfully!');

        return redirect(route('vehicles.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        $columns1 = [
            'start AS start',
            'end AS end',
            'color AS color',
            'title AS title'
        ];
        $allBookings1 = Duty::where('vehicle_id', $vehicle->id)->get($columns1);
        $bookings1 = $allBookings1->toJson();

        return view('vehicles.single', compact('bookings1', 'vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        return view('vehicles.create')->with('vehicle', $vehicle);
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
        $vehicle = Vehicle::findOrFail($id);
        $input = $request->all();

        if ($file = $request->file('image_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);

            $image = Image::create(['path' => $name]);

            $input['image_id'] = $image->id;
        }

        $vehicle->update($input);
        session()->flash('success', 'Vehicle updated Successfully!');

        $columns1 = [
            'start AS start',
            'end AS end',
            'color AS color',
            'title AS title'
        ];
        $allBookings1 = Duty::where('vehicle_id', $vehicle->id)->get($columns1);
        $bookings1 = $allBookings1->toJson();

        return view('vehicles.single', compact('bookings1', 'vehicle'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicle = Vehicle::withTrashed()->where('id', $id)->firstOrFail();
        if ($vehicle->trashed()) {
            $vehicle->forceDelete();
            session()->flash('success', ' Deleted Successfully!');
        } else {
            $vehicle->delete();
            session()->flash('success', ' Trashed Successfully!');
        }
        return redirect(route('vehicles.index'));
    }

    public function makeUnavailable(Vehicle $vehicle)
    {
        $vehicle->status = 0;
        $vehicle->save();

        session()->flash('success', 'Vehicle Make Unavailable Successfully!');

        return redirect(route('vehicles.index'));
    }

    public function makeAvailable(Vehicle $vehicle)
    {
        $vehicle->status = 1;
        $vehicle->save();

        session()->flash('success', 'Vehicle Make Available Successfully!');

        return redirect(route('vehicles.index'));
    }

    public function restore($id)
    {
        $trashed = Vehicle::withTrashed()->where('id', $id)->firstOrFail();
        $trashed->restore();
        session()->flash('success', ' Restored Successfully!');
        return redirect(route('vehicles.index'));
    }
}
