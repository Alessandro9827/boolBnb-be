<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Apartment;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $apartments = config('db.apartments');

        foreach ($apartments as $apartment) {
            $newApartment = new Apartment();
            $newApartment->text = $apartment['title'];
            $newApartment->tinyInteger = $apartment['no_rooms'];
            $newApartment->tinyInteger = $apartment['no_beds'];
            $newApartment->tinyInteger = $apartment['no_bathrooms'];
            $newApartment->text = $apartment['address'];
            $newApartment->text = $apartment['imgs'];
            $newApartment->boolean = $apartment['visible'];
            $newApartment->decimal = $apartment['latitude'];
            $newApartment->decimal = $apartment['longitude'];
            $newApartment->tinyInteger = $apartment['price'];
            $newApartment->text = $apartment['description'];
            $newApartment->save();


        }
    }
}
