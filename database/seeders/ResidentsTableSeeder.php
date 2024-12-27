<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResidentsTableSeeder extends Seeder
{
    public function run()
    {
        Resident::create(['name' => 'John Doe', 'house_id' => 1]);
        Resident::create(['name' => 'Jane Smith', 'house_id' => 2]);
        Resident::create(['name' => 'Ali Ahmad', 'house_id' => 3]);
    }
}
