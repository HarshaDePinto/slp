<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditloginRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use App\Image;
use App\Duty;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trashed = User::onlyTrashed()->get();
        $users = User::orderBy('id', 'DESC')->get();
        return view('users.index', compact('users', 'trashed'));
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
    public function show(User $user)
    {

        $columns1 = [
            'start AS start',
            'end AS end',
            'color AS color',
            'title AS title'
        ];
        $allBookings1 = Duty::where('user_id', $user->id)->get($columns1);
        $bookings1 = $allBookings1->toJson();
        $duties = Duty::all();
        return view('users.single', compact('bookings1', 'user', 'duties'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit')->with('user', $user);
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
        $user = User::findOrFail($id);

        $input = $request->all();

        if ($file = $request->file('image_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);

            $image = Image::create(['path' => $name]);

            $input['image_id'] = $image->id;
        }

        $user->update($input);

        session()->flash('success', 'Profile updated Successfully!');

        $columns1 = [
            'start AS start',
            'end AS end',
            'color AS color',
            'title AS title'
        ];
        $allBookings1 = Duty::where('user_id', $user->id)->get($columns1);
        $bookings1 = $allBookings1->toJson();
        $duties = Duty::all();
        return view('users.single', compact('bookings1', 'user', 'duties'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::withTrashed()->where('id', $id)->firstOrFail();
        if ($user->trashed()) {
            $user->forceDelete();
            session()->flash('success', ' Deleted Successfully!');
        } else {
            $user->delete();
            session()->flash('success', ' Trashed Successfully!');
        }
        return redirect(route('users.index'));
    }

    public function makeActive(User $user)
    {
        $user->is_active = 1;
        $user->save();

        session()->flash('success', 'User Activate Successfully!');

        return redirect(route('users.index'));
    }

    public function makeInactive(User $user)
    {
        $user->is_active = 0;
        $user->save();

        session()->flash('success', 'User Inactivate Successfully!');

        return redirect(route('users.index'));
    }

    public function changePassword(User $user)
    {
        return view('users.editlogin')->with('user', $user);
    }

    public function editlogin(EditloginRequest $request, User $user)
    {

        $input = $request->all();

        $password = Hash::make($input['password']);

        $input['password'] = $password;

        session()->flash('success', 'Password Changed Successfully!');

        $user->update($input);


        return redirect(route('home'));
    }

    public function restore($id)
    {
        $trashed = User::withTrashed()->where('id', $id)->firstOrFail();
        $trashed->restore();
        session()->flash('success', ' Restored Successfully!');
        return redirect(route('users.index'));
    }
}
