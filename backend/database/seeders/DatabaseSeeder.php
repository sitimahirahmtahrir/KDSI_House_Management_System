<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\House;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create an admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role' => 'Admin',
        ]);

        // Create sample houses
        House::create([
            'name' => 'House A',
            'address' => '123 Main Street',
            'type' => 'Apartment',
            'status' => 'Vacant',
        ]);

        House::create([
            'name' => 'House B',
            'address' => '456 Elm Street',
            'type' => 'Detached',
            'status' => 'Occupied',
        ]);
    }
}
