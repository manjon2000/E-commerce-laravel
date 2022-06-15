<?php

namespace App\Http\Controllers;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;

class InventoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventories = Inventory::get();

        return view("backend.inventories.index")->with("inventories", $inventories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::get();
        $stores = Store::get();
        return view("backend.inventories.form")->with("products", $products)->with("stores", $stores);

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
            'quantity' => 'required',
            'store' => 'required',
            'product' => 'required',
        ]);

        $data = [
            "quantity" => $request->quantity,
            "store_id" => $request->store,
            "product_id" => $request->product,
        ];
        $inventory = Inventory::create($data);

        return redirect(route("inventories.index"));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inventory = Inventory::find($id);
        if (isset($inventory)) {
            return view("backend.inventories.detail")->with("inventory", $inventory);

        }
        return redirect(route("inventories.index"))->with("message", __("web.not-data"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inventory = Inventory::find($id);
        $products = Product::get();
        $stores = Store::get();
        if (isset($inventory)) {
            return view("backend.inventories.form")->with("inventory", $inventory)->with("products", $products)->with("stores", $stores);
        }
        return redirect(route("inventories.index"))->withInput(['message' => __("web.not-data")]);
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
            'quantity' => 'required',
            'store' => 'required',
            'product' => 'required',
        ]);
        $inventory = Inventory::find($id);
        if (isset($inventory)) {
            $inventory->quantity = $request->quantity;
            $inventory->store_id = $request->store;
            $inventory->product_id = $request->product;

            $inventory->save();
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
        $inventory = Inventory::find($id);
        $inventory->delete();
        return redirect()->back();
    }
}
