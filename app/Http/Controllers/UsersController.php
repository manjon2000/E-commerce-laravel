<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\City;
use App\Models\Country;

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
        foreach($users as $user){
        $cities=City::where('id', '=', $user->city_id)->get();}
        foreach($cities as $city){
        $countries=Country::where('id', '=', $city->country_id)->get();}
        return view('backend.users.index')
        -> with ('countries', $countries)
        -> with ('cities', $cities)
        ->with ('users', $users);
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
        $users=User::get();
        $citiesfrances=City::where('country_id','=', 2)->get();
        $countries=Country::get();
        $citiesspains=City::where('country_id', '=', 1)->get();
        return view('backend.users.edit')
        -> with ('users', $users)
        -> with ('citiesfrances', $citiesfrances)
        -> with ('countries', $countries)
        -> with ('citiesspains', $citiesspains);

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
        $data=User::find($id);
        $data_es=User::find($id);
        $data_fr=User::find($id);
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->address = $request->address;
        $data_es->city_id = $request->city_es_value;
        $data_fr->city_id = $request->city_fr_value;
        $data->save();
        $data_es->save();
        $data_fr->save();
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
        //
    }
}
