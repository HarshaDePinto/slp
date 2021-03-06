<?php

namespace App\Http\Controllers;

use App\Agreement;
use Illuminate\Http\Request;
use App\Http\Requests\CreateToursRequest;
use App\Duty;
use App\User;
use App\Vehicle;
use App\Finance;
use App\Location;
use PDF;


class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trashed = Duty::onlyTrashed()->get();

        $tours = Duty::orderBy('start', 'ASC')->get();
        $agreements = Agreement::all();
        $vehicles = Vehicle::all();
        $drivers = User::all();

        return view('tours.index', compact('tours', 'agreements', 'vehicles', 'drivers', 'trashed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tours.create')->with('drivers', User::all())->with('vehicles', Vehicle::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateToursRequest $request)
    {
        $input = $request->all();

        $tour = $input['number'];

        $agreement = Agreement::create([
            'number' => $tour,

            'passenger_details' => '<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<strong>Name&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Nationality&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Age&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Contact&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Number<br>01.&nbsp;<br></strong><br></div>',

            'start_details' => '<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>Date&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Address&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Time&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;City<br><br><br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Flight Details<br></strong><br></div>',

            'end_details' => '<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>Date&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Address&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Time&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;City</strong></div>',

            'hotel_details' => '<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<strong>Date&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Hotel Name(Address)&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; City<br></strong><br></div>',

            'plan_details' => '<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <strong>Date&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Details<br></strong><br></div>',

            'activity_details' => '<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <strong>Date&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Details</strong></div>',


            'cost_details' => '<div><strong>The tour cost is&nbsp; &nbsp; &nbsp; &nbsp;from&nbsp; &nbsp; to&nbsp;<br></strong><br></div>',

            'payment_method' => '<div><strong>Date</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <strong>&nbsp;Amount</strong></div>',

            'includes_details' => '<div><strong>Vehicle</strong> :&nbsp;<strong>Comfortable Japan CAR (Toyota or Honda)</strong>&nbsp;<br><strong>Driver</strong> :&nbsp;<strong>English Speaking tourists’ board approval Driver</strong>&nbsp;<br><strong>Other</strong> :<strong>Air conditioned vehicle, Tourist’s insurance, Fuel, Parking fee, Toll Road fees (Highway) and all Taxes</strong>&nbsp;<br><br></div><ul><li>&nbsp; <strong>Free 500ml Water Bottle per day</strong></li><li>&nbsp; <strong>Free local Dialog connection with internet connection (Only one connection – If more than 08 days tour only)</strong></li><li>&nbsp; <strong>24 hours&nbsp; Information Hot-line - +94715213123</strong>&nbsp;</li></ul>',

            'accommodation_details' => '<ul><li>·<strong>Most of the hotels provide accommodation for the driver free of charge.</strong></li><li>·&nbsp;&nbsp;<strong>If your hotel provides that accommodation it should be very clean comfortable place. Please be kind about driver wellbeing. Because driver should be get good rest for safely driving.</strong></li><li>·&nbsp;<strong>Your hotel not provides driver accommodation for any reason Please kind enough to pay 1500LKR for driver accommodation per night.</strong></li><li>·<strong>In Sri lanka you can visit the attractions from 08.00am to 06.00pm. Then the driver will be able to drive from morning to evening and he never rides in night time because he need to take good rest to do the next day tour too. But please kindly note he can be flexible to drive before 08.00am and after 06.00pm depending on your needs.</strong></li></ul>',

            'condition' => '<ul><li>·<strong>ON ARRIVAL PAYMENT IS MUST AND YOU SHOULD HAVE TO CLEAR THE PAYMENTS ON THE MENTIONED / REQUESTED DATE IS COMPULSORY.</strong></li></ul><div><br></div><ul><li><strong>WE ARE PROVIDING A PRIVATE DRIVER FOR YOUR SRILANKAN TOUR, YOU WILL TRAVEL WITH A PROFESSIONAL DRIVER WHO CAN HELP YOU ON YOUR TOUR TIME.</strong></li></ul><div><br></div><ul><li>&nbsp;<strong>HE CANNOT GUIDE FOR HISTORICAL SIDE IN SRI LANKA, IF YOU NEED A GUIDE FOR ALL EXPLANATION ABOUT SRI LANKAN HISTORY; WE CAN ARRANGE A GUIDE FOR YOU. OUR DRIVER WILL HELP YOU TO FIND A GOOD GUIDE IN HISTORICAL AREA.&nbsp;</strong>&nbsp; &nbsp; &nbsp; &nbsp;</li></ul><div><br></div><ul><li><strong>ALL OF OUR DRIVERS ARE GOOD AND HAVE GOOD KNOWLEDGE. BUT UNFORTUNATELY IF YOU ARE NOT HAPPY WITH OUR DRIVER’S SERVICE, IF YOU FOUND ANY ISSUES FROM THE DRIVER PLEASE INFORM THAT ON TIME, THEN WE CAN KEEP THE SECRETS 100% AND CAN ARRANGE THE NEW DRIVER.&nbsp; IF YOU INFORM ANY ISSUES AFTER DEPARTURE FROM SRILANKA WE COULDN’T TAKE THE RESPONSIBILITY AND WE NEVER MAKE ANY REFUND.</strong></li></ul><div><strong>&nbsp;</strong></div><ul><li>·<strong>WE CAN TRAVEL THE AREA OR CITY VISIT WHICH YOU WERE MENTIONEN IN YOUR ITINERARY. IF YOU WANT TO TRAVEL OUT OF THE ITINERARY PLEASE INFORM US. SOME TIME IT WILL COST EXTRA. PLEASE KINDLY CONCERN ABOUT THE ITINERARY.</strong></li></ul><div><strong>&nbsp;</strong></div><ul><li><strong>EG: IF YOU NEED TO DRIVE OUT OF YOUR MENTIONED ITINERARY WE WILL CHARGE 45LKR PER EVERY EXTRA KILOMETERES. &nbsp;</strong></li></ul><div><br></div><ul><li>·<strong>MOST OF THE HOTELS PROVIDE DRIVER ACCOMMODATION FOR FREE OF CHARGE. IF YOUR HOTEL NOT PROVIDES DRIVER ACCOMMODATION FOR ANY REASON YOU SHOULD PAY 1500LKR FOR DRIVER ACCOMMODATION PER NIGHT.&nbsp;</strong></li></ul><div><strong>&nbsp;</strong></div><ul><li><strong>AFTER YOU JOIN WITH US, YOU CANNOT END OFF THE TOUR IN MIDDLE,&nbsp;</strong></li></ul><div><br></div><ul><li><strong>IF YOU NEED TO END IN MIDDLE YOU SHOULD HAVE TO PAY THE TOTAL COST FOR THE CANCELLATION.</strong></li></ul><div><br></div>'




        ]);

        $input['agreement_id'] = $agreement->id;

        $finance = Finance::create(['number' => $tour]);

        $input['finance_id'] = $finance->id;

        Duty::create($input);



        session()->flash('success', 'Tour Added Successfully!');
        return redirect(route('tours.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $tour = Duty::find($id);
        $vehicle = Vehicle::find($tour->vehicle_id);
        $agreement = Agreement::find($tour->agreement_id);
        $driver = User::find($tour->user_id);
        if ($vehicle && $driver) {
            $columns1 = [
                'start AS start',
                'end AS end',
                'color AS color',
                'title AS title'
            ];
            $allBookings1 = Duty::where('vehicle_id', $vehicle->id)->get($columns1);
            $bookingsv = $allBookings1->toJson();

            $columns2 = [
                'start AS start',
                'end AS end',
                'color AS color',
                'title AS title'
            ];
            $allBookings1 = Duty::where('user_id', $driver->id)->get($columns2);
            $bookingsd = $allBookings1->toJson();

            return view('tours.single', compact('tour', 'vehicle', 'driver', 'agreement', 'bookingsv', 'bookingsd'));
        } else {
            return view('tours.single', compact('tour', 'agreement'));
        }
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
        $vehicle = Vehicle::find($tour->vehicle_id);
        $driver = User::find($tour->user_id);

        if ($vehicle && $driver) {
            return view('tours.create')->with('tour', $tour)->with('selected_v', $vehicle)->with('selected_d', $driver)->with('drivers', User::all())->with('vehicles', Vehicle::all());
        } else {
            return view('tours.create')->with('tour', $tour)->with('drivers', User::all())->with('vehicles', Vehicle::all());
        }
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
        $tour = Duty::findOrFail($id);
        $input = $request->all();
        $tour->update($input);
        session()->flash('success', $tour->title . ' Updated Successfully!');
        return redirect(route('tours.show', $tour->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tour = Duty::withTrashed()->where('id', $id)->firstOrFail();

        if ($tour->trashed()) {
            $tour->forceDelete();
            session()->flash('success', ' Deleted Successfully!');
        } else {
            $tour->delete();
            session()->flash('success', ' Cancelled Successfully!');
        }
        return redirect(route('tours.index'));
    }
    public function makeConfirm($id)
    {
        $tour = Duty::findOrFail($id);
        $tour->status = 1;
        $tour->save();

        session()->flash('success', 'Tour Confirm Successfully!');

        return redirect(route('tours.index'));
    }

    public function makePending($id)
    {
        $tour = Duty::findOrFail($id);
        $tour->status = 0;
        $tour->save();

        session()->flash('success', 'Tour Make Pending Successfully!');

        return redirect(route('tours.index'));
    }

    public function manage($id)
    {
        $tour = Duty::findOrFail($id);

        return view('tours.manage')->with('tour', $tour);
    }

    public function locations($id)
    {
        $tour = Duty::findOrFail($id);

        return view('locations.index')->with('tour', $tour);
    }

    public function fuels($id)
    {
        $tour = Duty::findOrFail($id);
        $vehicle = Vehicle::find($tour->vehicle_id);

        return view('fuels.index')->with('tour', $tour)->with('vehicle', $vehicle);
    }

    public function maintenances($id)
    {
        $tour = Duty::findOrFail($id);
        $vehicle = Vehicle::find($tour->vehicle_id);

        return view('maintenances.index')->with('tour', $tour)->with('vehicle', $vehicle);
    }

    public function activities($id)
    {
        $tour = Duty::findOrFail($id);

        return view('activities.index')->with('tour', $tour);
    }

    public function shops($id)
    {
        $tour = Duty::findOrFail($id);

        return view('shops.index')->with('tour', $tour);
    }

    public function other($id)
    {
        $tour = Duty::findOrFail($id);

        return view('expenses.index')->with('tour', $tour);
    }

    public function salary($id)
    {
        $tour = Duty::findOrFail($id);
        $finance = Finance::find($tour->finance_id);


        return view('salaries.create')->with('tour', $tour)->with('finance', $finance);
    }

    public function summary($id)
    {
        $tour = Duty::findOrFail($id);
        $finance = Finance::find($tour->finance_id);
        $vehicle = Vehicle::find($tour->vehicle_id);
        $agreement = Agreement::find($tour->agreement_id);
        $driver = User::find($tour->user_id);
        return view('summaries.single', compact('tour', 'vehicle', 'driver', 'agreement', 'finance'));
    }

    public function restore($id)
    {
        $trashed = Duty::withTrashed()->where('id', $id)->firstOrFail();
        $trashed->restore();
        session()->flash('success', ' Restored Successfully!');
        return redirect(route('tours.index'));
    }

    public function downloadPDF($id)
    {

        $tour = Duty::find($id);
        $finance = Finance::find($tour->finance_id);
        $vehicle = Vehicle::find($tour->vehicle_id);
        $agreement = Agreement::find($tour->agreement_id);
        $driver = User::find($tour->user_id);
        $pdf = PDF::loadView('pdf', compact('tour', 'vehicle', 'driver', 'agreement', 'finance'));

        return $pdf->download('summery_' . $tour->number . '.pdf');

        //return view('pdf', compact('tour', 'vehicle', 'driver', 'agreement', 'finance'));
    }
}
