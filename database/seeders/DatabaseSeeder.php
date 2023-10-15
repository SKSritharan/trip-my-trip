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
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'role_id' => 1,
            'password' => Hash::make('12345678')
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Test vehicle owner',
            'email' => 'vehicle@example.com',
            'role_id' => 3,
            'password' => Hash::make('12345678')
        ]);

        Vehicle::factory()->count(5)->create();
    }
}
