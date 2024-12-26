<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MaintenanceRequest;
use App\Models\House;

class MaintenanceRequestSeeder extends Seeder
{
    public function run()
    {
        // Create fake houses first
        $houses = House::factory(10)->create();

        // Create maintenance requests for the houses
        foreach ($houses as $house) {
            MaintenanceRequest::create([
                'house_id' => $house->id,
                'description' => fake()->sentence(10),
                'status' => fake()->randomElement(['pending', 'in progress', 'completed']),
            ]);
        }
    }
}
