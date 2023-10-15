<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'owner_id',
        'model',
        'passenger_seats_available',
        'vehicle_number',
        'payment_type',
        'amount',
        'pickup_point',
        'img_url',
    ];

    public function scopeSearch($query, $searchTerm)
    {
        if ($searchTerm) {
            return $query->where('name', 'LIKE', '%'.$searchTerm.'%')
                ->orWhere('description', 'LIKE', '%'.$searchTerm.'%')
                ->orWhere('model', 'LIKE', '%'.$searchTerm.'%')
                ->orWhere('vehicle_number', 'LIKE', '%'.$searchTerm.'%');
        }
        return $query;
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function booking()
    {
        return $this->hasMany(VehicleBooking::class);
    }
}
