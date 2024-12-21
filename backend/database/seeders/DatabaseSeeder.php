<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\House;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create an admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // Add sample houses
        House::create([
            'house_number' => 'H001',
            'location' => 'Taman Mawar',
            'status' => 'Vacant',
        ]);

        House::create([
            'house_number' => 'H002',
            'location' => 'Taman Anggerik',
            'status' => 'Occupied',
        ]);
    }
}
