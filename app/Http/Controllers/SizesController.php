<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizes = Size::get();

        return view("backend.sizes.index")->with("sizes", $sizes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view("backend.sizes.form");

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
            'name_inferior' => 'required|max:255',
            'name_superior' => 'required|max:255',
        ]);

        $data = [
            "name_inferior" => $request->name_inferior,
            "name_superior" => $request->name_superior,
        ];
        $size = Size::create($data);

        return redirect(route("sizes.index"));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $size = Size::find($id);
        if (isset($size)) {
            return view("backend.sizes.detail")->with("size", $size);

        }
        return redirect(route("sizes.index"))->with("message", __("web.not-data"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $size = Size::find($id);
        if (isset($size)) {
            return view("backend.sizes.form")->with("size", $size);
        }
        return redirect(route("sizes.index"))->withInput(['message' => __("web.not-data")]);
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
            'name_inferior' => 'required|max:255',
            'name_superior' => 'required|max:255',
        ]);
        $size = Size::find($id);
        if (isset($size)) {
            $size->name_inferior = $request->name_inferior;
            $size->name_superior = $request->name_superior;

            $size->save();
            return redirect()->back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $size = Size::find($id);
        $size->delete();
        return redirect()->back();
    }
}
