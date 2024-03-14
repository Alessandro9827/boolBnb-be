<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    public function index(){
        // ? EAGER LOADING con il nome del metodo presente all'interno del model
        $apartments = Apartment::with('user')->with('lead')->paginate(20);
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
        $data = $request->all();

        if ( isset($data['address'])){
            $stringa = $data['address'];
            $apartments = Apartment::where('address', 'LIKE', "%{$stringa}%")->get();
        } elseif ( is_null($data['address'])) {
            $apartments = Apartment::all();
        } else {
            abort(404);
        }

        return response()->json([
            "success" => true,
            "results" => $apartments,
            "matches" => count($apartments)
        ]);
    }
}

