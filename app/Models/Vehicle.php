<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable =["name", "owner", "model", "passenger_seats_available", "vehicle_number", "place_id", "img_url"];

    public function place()
    {
        return $this->belongsTo(Place::class);
    }

    public function booking()
    {
        return $this->hasMany(VehicleBooking::class);
    }
}
