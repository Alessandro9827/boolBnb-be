<?php

namespace Database\Seeders;

use App\Models\Sponsor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sponsors = [
            'basic' => '2.99',
            'medium' => '5.99',
            'premium' => '9.99',
        ];

        foreach ($sponsors as $sponsorsName) {
            $newSponsor = new Sponsor();

            $newSponsor->name = $sponsorsName;
            $newSponsor->save();
        }
    }
}
