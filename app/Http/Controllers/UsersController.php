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
        $cities=City::get();
        $countries=Country::get();
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
        $citiesspains=City::where('country_id', 1)->get();
        $citiesfrances=City::where('country_id', 2)->get();
        $countries=Country::get();
        return view('backend.users.edit')
        -> with ('countries', $countries)
        -> with ('citiesspains', $citiesspains)
        -> with ('citiesfrances', $citiesfrances)
        -> with ('users', $users);
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
        //Agrupo datos de usuarios
        $data=User::find($id);
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->address = $request->address;
        if($request->city_es){
            $data->city_id = $request->city_es;
        } else {
            $data->city_id = $request->city_fr;
        }
        $data->save();

        
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
