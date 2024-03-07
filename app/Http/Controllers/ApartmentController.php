<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApartmentController extends Controller
{
    private $rules = [
        'title' => ['required', 'min:5', 'max:255', 'string'],
        'no_rooms' => ['required', 'min:1', 'max:100', 'integer'],
        'no_beds' => ['required', 'min:1', 'max:3', 'integer'],
        'no_bathrooms' => ['required', 'min:1', 'max:10', 'integer'],
        'square_meters' => ['required', 'min:10', 'max:10000', 'integer'],
        'address' => ['required', 'min:5', 'max:255', 'string'],
        'img' => ['url:https' || 'image', 'required'],
        'visible' => ['boolean'],
        'latidute' => ['min:4', 'max:6', 'float'],
        'longitude' => ['min:4', 'max:6', 'float'],
        'price' => ['required', 'min:10', 'max:100000', 'integer'],
        'description' => ['required', 'min:10', 'string'],
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $apartments = Apartment::all();
        return view('apartments.index', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Apartment $apartment)
    {
        $apartment = new Apartment();
        return view('apartments.create', compact('apartment'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        // dd($request->all());
        $data = $request->validate($this->rules);

        $imageSrc = Storage::put('uploads/apartments', $data['img']);
        $data['img'] = $imageSrc;
        
        $apartment = Apartment::create($data);
        return redirect()->route('user.apartments.show', $apartment);
    }

    /**
     * Display the specified resource.
     */
    public function show(Apartment $apartment)
    {
        return view('apartments.show', compact('apartment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Apartment $apartment)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Apartment $apartment )
    {
        $data = $request->validate($this->rules);
        $apartment->update($data);

        return redirect()->route('user.apartments.show', $apartment);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Apartment $apartment)
    {
        $apartment->delete();
        
        return redirect()->route('user.apartment.index');
    }


    public function deletedIndex(){
        $apartment = Apartment::onlyTrashed()->get();
        
        return view('user.apartment.deleted-index', compact('apartments'));
    }

    public function deletedShow(string $id){

        $apartment = Apartment::withTrashed()->where('id', $id)->first();
        
        return view('user.apartment.deleted-show', compact('apartment'));
    }

    public function deletedRestore(string $id){
        $apartment = Apartment::withTrashed()->where('id', $id)->first();
        $apartment->restore();
    }

    public function deletedDestroy(string $id){

        $apartment = Apartment::withTrashed()->where('id', $id)->first();

       
        $apartment->forceDelete () ;
        return redirect () ->route ('user.apartment.deleted.index') ;    

    }
}
