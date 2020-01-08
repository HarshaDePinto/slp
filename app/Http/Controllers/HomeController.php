<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Vehicle;
use App\Duty;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        $user = Auth::user();
        $tours = Duty::all();
        $vehicles = Vehicle::all();
        $columns1 = [
            'start AS start',
            'end AS end',
            'color AS color',
            'title AS title'
        ];
        $allBookings1 = Duty::get($columns1);
        $bookings1 = $allBookings1->toJson();

        $columns2 = [
            'start AS start',
            'end AS end',
            'color AS color',
            'title AS title'
        ];
        $allBookings2 = Duty::where('user_id', $user->id)->get($columns2);
        $bookings2 = $allBookings2->toJson();

        return view('home', compact('bookings1', 'user', 'bookings2', 'tours', 'vehicles'));
    }
}
