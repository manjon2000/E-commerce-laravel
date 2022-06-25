<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Size;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class SectionsController extends Controller
{
    //

     public function demoCart()
     {
        $productos = Product::get();
        $sizes = Size::get();
        return view('cart')
        -> with('productos',$productos)
        -> with('sizes',$sizes);
     }
     
     public function addCart( Request $request )
     {

      $data = [
         'category_id' => $request->category,
         'user_id'     => Auth::User()->id,
         'product_id'  => $request->product,
         'size_id'     => $request->size
      ];

      $query = Cart::Create($data);

         return response()->json(['success'=>'product Data is successfully Stored']);
     }

     public function itemsCart(Request $request)
     {
         if(isset($request->query))
         {
            $data = Product::select('carts.id AS cart_id','products.id AS product_id',
            'products.name', 'products.price', 'products.image_product')
            -> join('carts','carts.product_id','products.id')
            -> where ('carts.user_id', Auth::User() -> id)
            -> get();
            $product = '';  

            return response()->json([
               $data
            ]);
         }
     }
}
