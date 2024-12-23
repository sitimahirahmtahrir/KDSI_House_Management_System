<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('guests', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // Guest name
            $table->string('email')->unique(); // Guest email (unique)
            $table->string('phone_number'); // Guest phone number
            $table->text('address')->nullable(); // Optional guest address
            $table->date('check_in_date'); // Check-in date
            $table->date('check_out_date')->nullable(); // Check-out date (nullable for future updates)
            $table->unsignedBigInteger('house_id'); // Foreign key to 'houses' table
            $table->timestamps(); // Created and Updated timestamps

            // Define foreign key relationship
            $table->foreign('house_id')
                ->references('id')
                ->on('houses')
                ->onDelete('cascade'); // Delete guest records if house is deleted
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('guests');
    }
}
