<?php

namespace App\Http\Controllers;

use App\Http\Requests\DriverSearchRequest;


use App\User;
use App\Duty;
use App\Vehicle;
use App\Salary;
use PDF;

use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function driver($id)
    {
        $user = User::findOrFail($id);
        $tours = Duty::orderBy('id', 'DESC')->get();
        return view('history.driver', compact('tours', 'user'));
    }

    public function driver_search(DriverSearchRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $input = $request->all();
        $start = $input['start'];
        $end = $input['end'];
        $tours = Duty::orderBy('id', 'DESC')->get();
        return view('history.driver_report', compact('tours', 'user', 'start', 'end'));
    }

    public function driverPDF($id, $start, $end)
    {

        $user = User::findOrFail($id);
        $tours = Duty::orderBy('id', 'DESC')->get();
        $pdf = PDF::loadView('driver_salary',  compact('tours', 'user', 'start', 'end'));
        return $pdf->download('driver_salary.pdf');
    }
}
