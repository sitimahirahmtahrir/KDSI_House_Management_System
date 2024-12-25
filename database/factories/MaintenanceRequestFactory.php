<?php

namespace Database\Factories;

use App\Models\MaintenanceRequest;
use App\Models\User;
use App\Models\House;
use Illuminate\Database\Eloquent\Factories\Factory;

class MaintenanceRequestFactory extends Factory
{
    protected $model = MaintenanceRequest::class;

    public function definition(): array
    {
        return [
            'description' => $this->faker->sentence, // Random description
            'user_id' => User::inRandomOrder()->first()?->id, // Assign a random user ID
            'house_id' => House::inRandomOrder()->first()?->id, // Assign a random house ID
            'status' => $this->faker->randomElement(['pending', 'in_progress', 'completed']), // Random status
        ];
    }
}
