<?php

namespace App\Http\Controllers;

use App\Agreement;
use App\Duty;
use App\User;
use App\Vehicle;
use App\Finance;
use Illuminate\Http\Request;

class AgreementController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tour = Duty::findOrFail($id);
        $vehicle = Vehicle::findOrFail($tour->vehicle_id);
        $agreement = Agreement::findOrFail($tour->agreement_id);
        $driver = User::findOrFail($tour->user_id);
        return view('agreement.index', compact('tour', 'vehicle', 'driver', 'agreement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tour = Duty::findOrFail($id);
        $vehicle = Vehicle::findOrFail($tour->vehicle_id);
        $agreement = Agreement::findOrFail($tour->agreement_id);
        $driver = User::findOrFail($tour->user_id);
        return view('agreement.edit', compact('tour', 'vehicle', 'driver', 'agreement'));
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
        $agreement = Agreement::findOrFail($id);
        $input = $request->all();
        $agreement->update($input);

        return redirect(route('tours.index'));
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
