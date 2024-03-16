<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    public function index(){
        // ? EAGER LOADING con il nome del metodo presente all'interno del model
        $apartments = Apartment::with('user')->paginate(20);
        return response()->json(
            [
                "success" => true,
                "results" => $apartments
            ]);
    }

    public function show(Apartment $apartment){
        return response()->json([
            "success" => true,
            "results" => $apartment
        ]);
    }

    public function search(Request $request){
        $query = Apartment::query();

        if($request->has('address') && $request['address'] != "") {
            $apiKey = env('TOMTOM_API_KEY');
            $addressQuery = str_replace(' ', '+', $request['address']);

            $coordinate = "https://api.tomtom.com/search/2/geocode/{$addressQuery}.json?key={$apiKey}";
            $json = file_get_contents($coordinate);
            $obj = json_decode($json);

            $lat = $obj->results[0]->position->lat;
            $lon = $obj->results[0]->position->lon;

            $query->whereRaw('ST_Distance( POINT(apartments.longitude, apartments.latitude),POINT(' . $lon . ',' . $lat . ')) < ' . $request['range'] / 100);
        }
        
        $apartments = $query->with('user')->get()->toArray();
        
        return response()->json([
            "success" => true,
            "results" => $apartments,
        ]);
    }
}

