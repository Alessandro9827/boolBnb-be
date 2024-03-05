<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Marco',
            'surname' => 'Rossi',
            'date_of_birth' => '1998-04-19',
            'email' => 'marcorossi@gmail.com',
            'password' => Hash::make('password'),
            'address' => 'Via Roma 57',
        ]);
    }
}