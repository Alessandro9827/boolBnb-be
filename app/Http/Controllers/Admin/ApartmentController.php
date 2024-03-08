<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApartmentController extends Controller
{
    private $rules = [
        'title' => ['required', 'min:5', 'max:255', 'string'],
        'no_rooms' => ['required', 'min:1', 'max:100', 'integer'],
        'no_beds' => ['required', 'min:1', 'max:100', 'integer'],
        'no_bathrooms' => ['required', 'min:1', 'max:10', 'integer'],
        'square_meters' => ['nullable', 'min:10', 'max:10000', 'integer'],
        'address' => ['required', 'min:5', 'max:255', 'string'],
        'img' => 'required', 'image|url:https',
        'visible' => ['boolean'],
        'latidute' => ['min:4', 'max:6', 'float'],
        'longitude' => ['min:4', 'max:6', 'float'],
        'price' => ['required', 'min:10', 'max:100000', 'numeric'],
        'description' => ['nullable', 'min:10', 'string'],
    ];

    public function index()
    {
        $apartments = Apartment::all();
        return view('admin.apartments.index', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Apartment $apartment)
    {
        $apartment = new Apartment();
        return view('admin.apartments.create', compact('apartment'));
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
        return redirect()->route('admin.apartments.show', $apartment);
    }

    /**
     * Display the specified resource.
     */
    public function show(Apartment $apartment)
    {
        return view('admin.apartments.show', compact('apartment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Apartment $apartment){
        return view('admin.apartments.edit', compact('apartment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Apartment $apartment )
    {
        $data = $request->validate($this->rules);
        $imageSrc = Storage::put('uploads/apartments', $data['img']);
        $data['img'] = $imageSrc;
        
        $apartment->update($data);

        return redirect()->route('admin.apartments.show', $apartment);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Apartment $apartment)
    {
        $apartment->delete();
        
        return redirect()->route('admin.apartment.index');
    }


    public function deletedIndex(){
        $apartment = Apartment::onlyTrashed()->get();
        
        return view('admin.apartment.deleted-index', compact('apartments'));
    }

    public function deletedShow(string $id){

        $apartment = Apartment::withTrashed()->where('id', $id)->first();
        
        return view('admin.apartment.deleted-show', compact('apartment'));
    }

    public function deletedRestore(string $id){
        $apartment = Apartment::withTrashed()->where('id', $id)->first();
        $apartment->restore();
    }

    public function deletedDestroy(string $id){

        $apartment = Apartment::withTrashed()->where('id', $id)->first();

       
        $apartment->forceDelete () ;
        return redirect () ->route ('admin.apartment.deleted.index') ;    

    }
}
