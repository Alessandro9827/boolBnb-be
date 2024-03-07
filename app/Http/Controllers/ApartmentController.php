<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
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
        $data = $request->all();
        // dd($request->all());
        
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
    public function update(Request $request, string $id)
    {
        //
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
