<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'name', 'gender', 'known_languages', 'experience_years', 'contact_no', 'address', 'payment'];

    public function scopeSearch($query, $searchTerm)
    {
        if ($searchTerm) {
            return $query->where('name', 'LIKE', '%'.$searchTerm.'%')
                ->orWhere('known_languages', 'LIKE', '%'.$searchTerm.'%')
                ->orWhere('experience_years', 'LIKE', '%'.$searchTerm.'%')
                ->orWhere('payment', 'LIKE', '%'.$searchTerm.'%');
        }
        return $query;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bookings()
    {
        return $this->hasMany(GuideBooking::class, 'guide_id');
    }
}
