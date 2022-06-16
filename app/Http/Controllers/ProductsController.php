<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Category;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
        return view('backend.products.index')
            ->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('backend.products.create')
            ->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ruta1 = public_path('images/imageProduct');
        if (!file_exists($ruta1)) {
            mkdir($ruta1);
        }
        $imageProduct = time() . '.' .$request->main_image_product->extension();
    
        $request->main_image_product->move(public_path('images/imageProduct'), $imageProduct);

        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'image_product' => $imageProduct,
            'category_id' => $request->categoria_producte
        ];
        $products = Product::create($data);
        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product= Product::find($id);
        $productsimages= ProductImage::where('product_id', $id)->get();
        return view('backend.products.show')
        ->with('productsimages', $productsimages)
        ->with('product', $product);
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $products=Product::find($id);
        $categories = Category::get();
        return view('backend.products.edit')
        ->with('products', $products)
        ->with('categories', $categories);
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
        $imageProduct = time() . '.' .$request->main_image_product->extension();
    
        $request->main_image_product->move(public_path('images/imageProduct'), $imageProduct);

        $data = Product::find($id);
        $data->name = $request->name;
        $data->price = $request->price;
        $data->category_id = $request->categoria_producte;
        $data->image_product = $imageProduct;
        $data->save();
        
        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id);
        $product->delete();
        return redirect('/products');
    }
    public function updateimagesindex($id)
    {
        return view('backend.products.imgsecondary');
    }
    public function updateimages()
    {
        
    }
}
