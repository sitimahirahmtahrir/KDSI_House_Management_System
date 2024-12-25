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
            $table->string('house_number')->unique(); // Unique house number identifier
            $table->string('address'); // Address of the house
            $table->enum('status', ['vacant', 'occupied', 'under_maintenance'])->default('vacant'); // House status
            $table->unsignedBigInteger('tenant_id')->nullable(); // Foreign key for tenant (nullable)
            $table->integer('number_of_rooms')->nullable(); // Number of rooms in the house
            $table->integer('rental_price')->nullable(); // Rental price (optional)
            $table->text('description')->nullable(); // Description or additional details about the house
            $table->timestamps(); // Created and Updated timestamps

            // Add foreign key constraint for tenant_id
            $table->foreign('tenant_id')->references('id')->on('users')->onDelete('set null');
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
