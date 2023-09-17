<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['slug'=> 'admin','name' => 'Admin'],
            ['slug'=> 'guide','name' => 'Tourist Guide'],
            ['slug'=> 'vehicle','name' => 'Vehicle Owner'],
            ['slug'=> 'user','name' => 'User'],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
