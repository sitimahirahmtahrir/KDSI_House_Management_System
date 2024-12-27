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
        // Check if the 'date' column exists before trying to modify it
        if (Schema::hasColumn('announcements', 'date')) {
            Schema::table('announcements', function (Blueprint $table) {
                $table->date('date')->nullable()->change();
            });
        } else {
            // If the 'date' column doesn't exist, create it
            Schema::table('announcements', function (Blueprint $table) {
                $table->date('date')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Check if the 'date' column exists before trying to modify it
        if (Schema::hasColumn('announcements', 'date')) {
            Schema::table('announcements', function (Blueprint $table) {
                $table->date('date')->nullable(false)->change();
            });
        }
    }
};
