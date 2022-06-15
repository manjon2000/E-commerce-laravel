<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class ToolsController extends Controller
{
    public function cities($country)
    {
        $cities= City::where("country_id","=", $country)->get();

        return response()->json($cities);
    }
}
