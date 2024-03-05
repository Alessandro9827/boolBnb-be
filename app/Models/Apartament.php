<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartament extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'no_rooms',
        'no_beds',
        'square_meters',
        'addres',
        'imgs',
        'visible',
        'latitude',
        'longitude',
        'price',
        'description'

    ];
}
