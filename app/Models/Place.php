<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'lat', 'long', 'img_url'
    ];

    public function scopeSearch($query, $searchTerm)
    {
        if ($searchTerm) {
            return $query->where('name', 'LIKE', '%' . $searchTerm . '%')->orWhere('description', 'LIKE', '%' . $searchTerm . '%');
        }
        return $query;
    }
}
