<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // Name or identifier for the house
            $table->string('address'); // Address of the house
            $table->enum('status', ['vacant', 'occupied', 'under_maintenance'])->default('vacant'); // House status
            $table->integer('number_of_rooms')->nullable(); // Number of rooms in the house
            $table->integer('rental_price')->nullable(); // Rental price (optional)
            $table->text('description')->nullable(); // Description or additional details about the house
            $table->timestamps(); // Created and Updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('houses');
    }
}
