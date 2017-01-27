<?php

namespace App\Http\Controllers;


use App\Model\City;

class CityController extends Controller
{
    public function getAreas($name) {
        //Ajax request
        //Get city id by name
        $city_id = City::where('name', $name)->first()->id;

        //Get areas belonging to the chosen city
        $areas =  City::find($city_id)->areas()->get();

        return response()->json([
            'data'   => $areas,
        ]);
    }

}
