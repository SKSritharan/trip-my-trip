<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Vehicle;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(PlacesSeeder::class);
        $this->call(RolesSeeder::class);

        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'role_id' => 1,
            'password' => Hash::make('12345678')
        ]);

        $tourist_guide = \App\Models\User::factory()->create([
            'name' => 'Test tourist guide',
            'email' => 'guide@example.com',
            'role_id' => 2,
            'password' => Hash::make('12345678')
        ]);

        $vehicle_owner = \App\Models\User::factory()->create([
            'name' => 'Test vehicle owner',
            'email' => 'vehicle@example.com',
            'role_id' => 3,
            'password' => Hash::make('12345678')
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Test user',
            'email' => 'user@example.com',
            'role_id' => 4,
            'password' => Hash::make('12345678')
        ]);

        $tourist_guide->guide()->create([
            'name' => 'Test Guide',
            'gender' => 'Male',
            'known_languages' => 'English, French',
            'experience_years' => 5,
            'contact_no' => '1234567890',
            'address' => 'Guide Address',
            'payment' => 2500.00,
        ]);

        $vehicle_owner->vehicle()->create([
            'name' => 'Test Vehicle',
            'description' => 'Vehicle Description',
            'model' => 'Model Details',
            'passenger_seats_available' => 4,
            'vehicle_number' => 'ABC123',
            'payment_type' => 'Cash',
            'amount' => 1500.00,
            'pickup_point' => 'Pickup Location',
            'img_url' => 'https://media.autoexpress.co.uk/image/private/s--Mo76lAjR--/v1695817587/evo/2023/09/BMW%20i5%20review.jpg',
        ]);
    }
}
