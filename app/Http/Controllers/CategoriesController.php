<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::get();

        return view("backend.categories.index")->with("categories", $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view("backend.categories.form");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $imageName = time() . '.' . $request->image_category->extension();

        $request->image_category->move(public_path('images'), $imageName);

        $data = [
            "name" => $request->name,
            "image_category" => $imageName,
        ];
        $data_es = ['description' => $request->description_es];
        $data['es'] = $data_es;
        $data_fr = ['description' => $request->description_fr];
        $data['fr'] = $data_fr;
        $data_en = ['description' => $request->description_en];
        $data['en'] = $data_en;
        $category = Category::create($data);

        return view("backend.categories.index");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);

        return view("backend.categories.detail")->with("category", $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);

        return view("backend.categories.form")->with("category", $category);
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

        $category = Category::find($id);
        $category->name = $request->name;
        if (isset($request->image_category)) {
            $imageName = time() . '.' . $request->image_category->extension();
            $request->image_category->move(public_path('images'), $imageName);
            try {
                //code...
                unlink(public_path("images/" . $category->image_category));

            } catch (\Throwable $th) {
                //throw $th;
            }
            $category->image_category = $imageName;
        }

        $category->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        try {
            //code...
            unlink(public_path("images/" . $category->image_category));

        } catch (\Throwable $th) {
            //throw $th;
        }
        $category->delete();
    }
}
