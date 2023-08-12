<?php

namespace Database\Seeders;

use App\Models\Place;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlacesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $places = [
            [
                'name' => 'Sigiriya',
                'description' => 'Ancient rock fortress located in the northern Matale District near the town of Dambulla in the Central Province, Sri Lanka.',
                'lat' => 7.9500,
                'long' => 80.7498,
            ],
            [
                'name' => 'Ella',
                'description' => 'Picturesque village in the Badulla District of Uva Province, Sri Lanka.',
                'lat' => 6.8709,
                'long' => 81.0452,
            ],
            // Add more places here...
        ];

        foreach ($places as $placeData) {
            Place::create($placeData);
        }
    }
}
