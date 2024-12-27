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
        Schema::table('announcements', function (Blueprint $table) {
            $table->string('details')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('announcements', function (Blueprint $table) {
            $table->string('details')->nullable(false)->change();
        });
    }
}
