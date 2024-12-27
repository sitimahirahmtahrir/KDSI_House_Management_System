<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidentsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('residents', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // Resident's name
            $table->foreignId('house_id')->constrained('houses')->onDelete('cascade'); // Foreign key to houses table
            $table->timestamps(); // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('residents');
    }
}
