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
        // Check if the 'deleted_at' column does not already exist
        if (!Schema::hasColumn('announcements', 'deleted_at')) {
            Schema::table('announcements', function (Blueprint $table) {
                $table->softDeletes(); // Adds the `deleted_at` column
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Check if the 'deleted_at' column exists before attempting to drop it
        if (Schema::hasColumn('announcements', 'deleted_at')) {
            Schema::table('announcements', function (Blueprint $table) {
                $table->dropSoftDeletes(); // Removes the `deleted_at` column
            });
        }
    }
};
