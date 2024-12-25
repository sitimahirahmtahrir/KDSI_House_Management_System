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
            $table->text('visit_reason')->nullable(); // Reason for the visit (nullable for flexibility)
            $table->unsignedBigInteger('house_id'); // Associated house
            $table->timestamp('check_in_time'); // Check-in time
            $table->timestamp('check_out_time')->nullable(); // Check-out time (nullable if ongoing)
            $table->timestamps(); // Created and updated timestamps

            // Foreign key constraint for house_id
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
        Schema::dropIfExists('guests');
    }
}
