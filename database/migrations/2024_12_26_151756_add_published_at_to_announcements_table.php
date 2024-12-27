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
        // Check if the column does not already exist
        if (!Schema::hasColumn('announcements', 'published_at')) {
            Schema::table('announcements', function (Blueprint $table) {
                $table->timestamp('published_at')->nullable()->after('content'); // Add the column after 'content'
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Check if the column exists before attempting to drop it
        if (Schema::hasColumn('announcements', 'published_at')) {
            Schema::table('announcements', function (Blueprint $table) {
                $table->dropColumn('published_at');
            });
        }
    }
};
