<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\ProductImage;
use App\Models\Product;
use Dotenv\Result\Success;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function createimagesindex($id)
    {
        $images=Product::find($id);
        return view('backend.products.imgsecondary')
        ->with('images', $images);

    }
    public function createimages(Request $request)
    {

        $ruta1 = public_path('images/imageProductSecondary');
        if (!file_exists($ruta1)) {
            mkdir($ruta1);
        }

        $imageProduct = time() . '.' .$request->main_image_product->extension();
    
        $request->main_image_product->move(public_path('images/imageProductSecondary'), $imageProduct);

        $data = [
            'image_url' => $imageProduct,
            'product_id'=> $request->id_product
        ];
        ProductImage::create($data);
        return redirect('/products');
    }
    public function updateimage(Request $request){
        
    try {
        $idProduct=$request->id_main;
        $mainImage=$request->main;
        $idImageProduct=$request->id_secondary;
        $secondaryImage=$request->secondary;
        $rutaSecondary3=public_path().'/images/imageProductSecondary/'.$secondaryImage;
        $rutaSecondary4=public_path().'/images/imageProduct/'.$secondaryImage;
        Storage::move(public_path('images/imageProduct/'.$mainImage) ,public_path('images/imageProductSecondary/'.$mainImage));
        // Storage::move($rutaSecondary3, $rutaSecondary4);
        $product=Product::find($idProduct);
        $productImage=ProductImage::find($idImageProduct);
        $product->image_product=$secondaryImage;
        $productImage->image_url=$mainImage;
        $product->save();
        $productImage->save();

    } catch(exception $e){
        return response($e, 200)
        ->header('Content-Type', 'text/plain');
    }     
    }
}
