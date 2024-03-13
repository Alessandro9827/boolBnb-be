<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewContact;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function store(Request $request){
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required',
            'email' => ['required', 'email'],
            'message' => 'required',
            'date' => 'required',
        ]);

        if($validator->false()){
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ]);
        }

        $newLead = new Lead();
        $newLead->create($data);

        Mail::to("admin@boolbnb")->send(new NewContact($newLead));

        return response()->json([
            'success' => true, 
        ]);
    }
}
