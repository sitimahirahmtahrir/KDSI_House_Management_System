<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\House;

class HouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sample data for the 'houses' table
        House::create([
            'house_number' => 'H001',
            'address' => '123 Navy Street',
            'status' => 'vacant',
        ]);

        House::create([
            'house_number' => 'H002',
            'address' => '456 Admiral Road',
            'status' => 'occupied',
        ]);

        House::create([
            'house_number' => 'H003',
            'address' => '789 Marine Drive',
            'status' => 'under maintenance',
        ]);
    }
}
