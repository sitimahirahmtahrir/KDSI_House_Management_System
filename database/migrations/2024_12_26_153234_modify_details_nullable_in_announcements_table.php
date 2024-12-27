<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyDetailsNullableInAnnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Check if the 'details' column exists before trying to modify it
        if (Schema::hasColumn('announcements', 'details')) {
            Schema::table('announcements', function (Blueprint $table) {
                $table->string('details')->nullable()->change();
            });
        } else {
            // Add the 'details' column if it doesn't exist
            Schema::table('announcements', function (Blueprint $table) {
                $table->string('details')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Check if the 'details' column exists before trying to modify it
        if (Schema::hasColumn('announcements', 'details')) {
            Schema::table('announcements', function (Blueprint $table) {
                $table->string('details')->nullable(false)->change();
            });
        }
    }
}
