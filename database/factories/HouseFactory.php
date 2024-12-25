<?php

namespace Database\Factories;

use App\Models\House;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class HouseFactory extends Factory
{
    protected $model = House::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'house_number' => $this->faker->unique()->numberBetween(1, 100), // Unique house number
            'address' => $this->faker->address, // Random address
            'status' => $this->faker->randomElement(['vacant', 'occupied', 'under_maintenance']), // Random status
            'tenant_id' => User::inRandomOrder()->first()?->id, // Assign a random tenant or leave null
            'number_of_rooms' => $this->faker->numberBetween(1, 5), // Random number of rooms
            'rental_price' => $this->faker->numberBetween(1000, 5000), // Random rental price
            'description' => $this->faker->sentence(), // Random description
        ];
    }
}
