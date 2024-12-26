<?php

namespace Database\Factories;

use App\Models\House;
use Illuminate\Database\Eloquent\Factories\Factory;

class HouseFactory extends Factory
{
    protected $model = House::class;

    public function definition()
    {
        return [
            'address' => $this->faker->address,
            'resident_name' => $this->faker->name,
            'status' => $this->faker->randomElement(['vacant', 'occupied', 'under maintenance']),
        ];
    }
}
