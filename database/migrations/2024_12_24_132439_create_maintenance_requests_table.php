<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintenanceRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('maintenance_requests', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->text('description'); // Maintenance request description
            $table->unsignedBigInteger('user_id'); // Foreign key for the user who made the request
            $table->unsignedBigInteger('house_id'); // Foreign key for the related house
            $table->enum('status', ['pending', 'in_progress', 'completed'])->default('pending'); // Status of the maintenance request
            $table->timestamps(); // Created and Updated timestamps

            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('house_id')->references('id')->on('houses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenance_requests');
    }
}
