<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Vehicle;
use App\Duty;
use App\User;
use App\Location;
use App\Activity;
use App\Finance;
use App\Shop;

class ShopsController extends Controller
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
        $shops = Shop::all();
        $user = Auth::user();
        $tours = Duty::all();
        $vehicles = Vehicle::all();
        if ($shops) {

            return view('shops.create', compact('shops', 'user', 'tours', 'vehicles'));
        } else {
            return view('shops.create', compact('user', 'tours', 'vehicles'));
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
        $shop = Shop::create($input);
        $shop->commission = $shop->bill * $shop->commission / 200;
        $shop->save();

        $tour = Duty::find($input['tour']);
        $finance = Finance::find($tour->finance_id);
        $finance->from_shops = $finance->from_shops + $shop->commission;
        $finance->save();
        $shop->duties()->save($tour);
        session()->flash('success', 'Shopping Added Successfully!');
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
