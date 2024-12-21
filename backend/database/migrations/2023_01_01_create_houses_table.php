<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHousesTable extends Migration
{
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->string('house_number')->unique();
            $table->string('location');
            $table->enum('status', ['Vacant', 'Occupied', 'Maintenance'])->default('Vacant');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('houses');
    }
}
