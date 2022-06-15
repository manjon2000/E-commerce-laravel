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
        $request->validate([
            'name' => 'required|unique:categories|max:255',
            'image_category' => 'required|max:10000|mimes:jpg,jpeg,png',
            "description_es" => 'required|max:255',
            "description_en" => 'required|max:255',
            "description_fr" => 'required|max:255',
        ]);
        
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

        return redirect(route("categories.index"));

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
        if(isset($category)){
            return view("backend.categories.detail")->with("category", $category);

        }
        return redirect(route("categories.index"))->with("message", __("web.not-data"));
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
        if (isset($category)) {
            return view("backend.categories.form")->with("category", $category);
        }
        return redirect(route("categories.index"))->withInput(['message' => __("web.not-data")]);
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
            'name'           => 'required|max:255',
            'image_category' => 'max:2048|mimes:jpg,jpeg,png',
            "description_es" => 'required|max:255',
            "description_en" => 'required|max:255',
            "description_fr" => 'required|max:255',
        ]);
        $category = Category::find($id);
        if (isset($category)) {
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
        $category = Category::find($id);
        try {
            //code...
            unlink(public_path("images/" . $category->image_category));

        } catch (\Throwable $th) {
            //throw $th;
        }
        $category->delete();
        return redirect()->back();
    }
}
