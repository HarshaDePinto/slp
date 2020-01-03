<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditloginRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use App\Image;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
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
        return view('users.single')->with('user', $user);
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
        return redirect(route('home'));
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

        $user->update($input);

        return redirect(route('home'));
    }
}
