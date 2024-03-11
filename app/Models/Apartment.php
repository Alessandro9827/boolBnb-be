<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'user_id',
        'no_rooms',
        'no_beds',
        'no_bathrooms',
        'square_meters',
        'img',
        'visible',
        'address',
        'latitude',
        'longitude',
        'price',
        'description'
    ];
    public function user() {
        return $this->belongsTo(User::class);
    }
}
