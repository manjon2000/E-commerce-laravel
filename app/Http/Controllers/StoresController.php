<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\City;
use App\Models\Country;

class StoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiendas = Store::get();
        return view('backend.stores.index')
        -> with('tiendas',$tiendas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $citiesfrances=City::where('country_id','=', 2)->get();
        $countries=Country::get();
        $citiesspains=City::where('country_id', '=', 1)->get();
        return view('backend.stores.create')
        -> with ('citiesfrances', $citiesfrances)
        -> with ('countries', $countries)
        -> with ('citiesspains', $citiesspains);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nameStore'     => 'required',
            'addressStore'  => 'required',
            'emailStore'    => 'required|regex:/(.+)@(.+)\.(.+)/i',
            'telStore'      => 'required|numeric|min:6',
            'timeStart'     => 'required|max:5',
            'timeEnd'       => 'required|max:5'
        ]);

        
        $data = [
            'name'          => $request->nameStore,
            'address'       => $request->addressStore,
            'phone_number'  => $request->telStore,
            'email'         => $request->emailStore,
            'city_id'       => 1,
            'schedule_end'  => $request->timeEnd,
            'schedule_start'=> $request->timeStart,
        ];

        $query = Store::create($data);

        return redirect('/stores');
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
        $tienda = Store::where('id', $id)->get();
        return view('backend.stores.edit')
        -> with('tienda',$tienda);
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
            'nameStore'     => 'required',
            'addressStore'  => 'required',
            'emailStore'    => 'required|regex:/(.+)@(.+)\.(.+)/i',
            'telStore'      => 'required|numeric|min:6',
            'timeStart'     => 'required|max:5',
            'timeEnd'       => 'required|max:5'
        ]);

        $tienda = Store::find($id);

        $tienda->name         = $request->nameStore;
        $tienda->address      = $request->addressStore;
        $tienda->email        = $request->emailStore;
        $tienda->phone_number = $request->telStore;
        $tienda->schedule_end  = $request->timeEnd;
        $tienda->schedule_start= $request->timeStart;

        $tienda->save();
        return redirect('/stores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $store = Store::find($id);
        $store->delete();
        return redirect('/stores');
    }
}
