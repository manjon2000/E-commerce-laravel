<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\City;
use App\Models\Country;
use Auth;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::get();
        return view('backend.users.index')
        -> with ('users', $users);
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
        $users=User::get();
        foreach($users as $user)
        {
        if(is_null($user->city_id)){
            $cities=City::get();
            $countries=Country::get();
        } else{
            $cities=City::where('id', '=', $user->city_id)->get();
            $countries=Country::where('id', '=', $user->cities->country_id)->get();
        }}
        return view('backend.users.detail')
        -> with ('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($id);
        $countries=Country::get();
        return view('backend.users.edit')
        -> with ('user', $user)
        -> with ('countries', $countries);

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
        $request->validate([
            'name' => 'required',
            'first_name' => 'required',
            "last_name" => 'required|max:255',
            "address" => 'required|max:255',
            "city" => 'required|max:255',
        ]);
        $data=User::find($id);
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->address = $request->address;
        $data->city_id = $request->city;
        $data->save();
        return redirect('/profiles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=User::find($id);
        $data->delete();
        return redirect('/profiles');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $user=Auth::user();
        $countries=Country::get();
        return view('backend.users.edit')
        -> with ('user', $user)
        -> with ('countries', $countries);
    }
}
