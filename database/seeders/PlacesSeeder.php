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
                'img_url' => 'places/1/1635990378_1635990376570.jpg'
            ],
            [
                'name' => 'Ella',
                'description' => 'Picturesque village in the Badulla District of Uva Province, Sri Lanka.',
                'lat' => 6.8709,
                'long' => 81.0452,
                'img_url' => 'places/2/ella.jpg'
            ],
            [
                'name' => 'Jaffna Fort',
                'description' => 'Jaffna Fort is a fort built by the Portuguese at Jaffna, Sri Lanka in 1618 under Phillippe de Oliveira following the Portuguese invasion of Jaffna',
                'lat' => 9.66,
                'long' => 80.0,
                'img_url' => 'places/3/jaffna_fort.jpg'
            ],
            [
                'name' => 'Adams Peak',
                'description' => 'Adam \'s Peak is a 2,243 m tall conical sacred mountain located in central Sri Lanka.',
                'lat' => 6.80,
                'long' => 80.49,
                'img_url' => 'places/4/adams-peak.jpg'
            ],
            // Add more places here...
        ];

        foreach ($places as $placeData) {
            Place::create($placeData);
        }
    }
}
