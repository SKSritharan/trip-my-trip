<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'gender', 'known_languages', 'experience_years', 'contact_no', 'address', 'payment'];
}
