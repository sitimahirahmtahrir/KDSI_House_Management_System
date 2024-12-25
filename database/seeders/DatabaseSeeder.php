<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\House;
use App\Models\Guest;
use App\Models\MaintenanceRequest;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        // Seed default admin user
        User::firstOrCreate(
            ['email' => 'admin@example.com'], // Check for uniqueness
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'), // Use a strong password in production
                'role' => 'admin',
            ]
        );

        // Seed sample users
        User::factory()->count(10)->create();

        // Seed sample houses
        House::factory()->count(10)->create();

        // Seed sample guests
        Guest::factory()->count(20)->create();

        // Seed sample maintenance requests
        MaintenanceRequest::factory()->count(15)->create();
    }
}
