<?php

namespace App\Http\Controllers;

use App\Category;
use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequestController extends Controller
{
    public function requestCatCreate(Request $request)
    {

        $categories = Category::all();
        return view('request.category.create', compact('categories'));
    }

    public function requestCatStore(Request $request)
    {
        $latitude = $request->get('latitude');
        $longitude = $request->get('longitude');
        $radius = (integer) $request->get('radius');
        $category_id = (integer) $request->get('category_id');

        $locations = Location::where([
            ['latitude', '!=', $latitude],
            ['longitude', '!=', $longitude],
            ['category_id' , '=' , $category_id]
        ])->whereRaw(DB::raw("(6371  * acos( cos( radians($latitude) ) * cos( radians( latitude ) )  * 
                          cos( radians( longitude ) - radians($longitude) ) + sin( radians($latitude) ) * 
                          sin(radians( latitude ) ) ) ) < $radius ")
        )->take(5)->get();


        return view('request.category.show' , compact(['latitude' , 'longitude' , 'locations']));

    }
}
