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
        // Seed default admin user (if not exists)
        User::firstOrCreate(
            ['email' => 'admin@example.com'], // Check if the admin user already exists
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'), // Use a strong password in production
                'role' => 'admin',
            ]
        );

        // Seed additional sample users
        $this->seedUsers();

        // Seed houses with factory data
        $this->seedHouses();

        // Seed guests with factory data
        $this->seedGuests();

        // Seed maintenance requests with factory data
        $this->seedMaintenanceRequests();

        $this->call(MaintenanceRequestSeeder::class);
    }

    /**
     * Seed sample users using the factory.
     */
    private function seedUsers(): void
    {
        User::factory()->count(10)->create(); // Creates 10 sample users
    }

    /**
     * Seed sample houses using the factory.
     */
    private function seedHouses(): void
    {
        House::factory()->count(10)->create(); // Creates 10 sample houses
    }

    /**
     * Seed sample guests using the factory.
     */
    private function seedGuests(): void
    {
        Guest::factory()->count(20)->create(); // Creates 20 sample guests
    }

    /**
     * Seed sample maintenance requests using the factory.
     */
    private function seedMaintenanceRequests(): void
    {
        MaintenanceRequest::factory()->count(15)->create(); // Creates 15 sample maintenance requests
    }
}
