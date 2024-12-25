<?php

namespace Database\Factories;

use App\Models\Guest;
use App\Models\House;
use Illuminate\Database\Eloquent\Factories\Factory;

class GuestFactory extends Factory
{
    protected $model = Guest::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name, // Guest's name
            'visit_reason' => $this->faker->sentence, // Random visit reason
            'house_id' => House::inRandomOrder()->first()?->id, // Assign a random house ID
            'check_in_time' => $this->faker->dateTimeBetween('-1 week', 'now'), // Random check-in time
            'check_out_time' => $this->faker->optional()->dateTimeBetween('now', '+1 week'), // Optional check-out time
        ];
    }
}
