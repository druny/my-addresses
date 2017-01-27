<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\City;

class CityController extends Controller
{
    public function getAreas($name) {
        $city_id = City::where('name', $name)->first()->id;
        $areas =  City::find($city_id)->areas()->get();
        return response()->json([
            'data'   => $areas,
        ]);
    }

}
