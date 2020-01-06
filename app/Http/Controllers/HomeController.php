<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
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


        $columns1 = [
            'start AS start',
            'end AS end',
            'color AS color',
            'title AS title'
        ];
        $allBookings1 = Duty::get($columns1);
        $bookings1 = $allBookings1->toJson();

        return view('home', compact('bookings1'));
    }
}
