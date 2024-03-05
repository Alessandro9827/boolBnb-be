<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'no_rooms',
        'no_beds',
        'no_bathrooms',
        'imgs',
        'visible',
        'latitude',
        'longitude',
        'price',
        'description'

    ];
}
