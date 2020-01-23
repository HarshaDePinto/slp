<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Duty;
use App\User;
use App\Vehicle;
use App\Finance;
use App\Salary;

class SalaryController extends Controller
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
        $input = $request->all();
        $salary = Salary::create($input);
        $tour = Duty::find($input['tour']);
        $salary->duties()->save($tour);
        $driver = User::find($tour->user_id);
        $salary->users()->save($driver);
        $finance = Finance::find($tour->finance_id);
        $finance->to_driver = $finance->to_driver + $input['salary'];
        $finance->from_client = $finance->from_client + $input['from_client'] * $input['drate'];
        $finance->from_activities = $finance->from_activities + $input['activity'];
        $finance->from_shops = $finance->from_shops + $input['shopping'];
        $finance->to_fuel = $finance->to_fuel + $input['to_fuel'];
        $finance->to_maintenance = $finance->to_maintenance + $input['to_maintenance'];
        $finance->to_other = $finance->to_other + $input['to_other'];
        $finance->save();
        session()->flash('success', 'Salary Added Successfully!');
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
