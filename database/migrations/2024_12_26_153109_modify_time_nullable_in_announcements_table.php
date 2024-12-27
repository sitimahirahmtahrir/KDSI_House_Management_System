<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Check if the 'details' column exists
        if (Schema::hasColumn('announcements', 'details')) {
            Schema::table('announcements', function (Blueprint $table) {
                $table->string('details', 255)->nullable()->change(); // Modify column if it exists
            });
        } else {
            // Add the 'details' column if it does not exist
            Schema::table('announcements', function (Blueprint $table) {
                $table->string('details', 255)->nullable(); // Create a new 'details' column
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Check if the 'details' column exists before trying to remove it
        if (Schema::hasColumn('announcements', 'details')) {
            Schema::table('announcements', function (Blueprint $table) {
                $table->dropColumn('details'); // Remove the 'details' column
            });
        }
    }
};
