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
    Schema::table('announcements', function (Blueprint $table) {
        $table->date('date')->default('2024-01-01')->change(); // Set default date
    });
}

public function down()
{
    Schema::table('announcements', function (Blueprint $table) {
        $table->date('date')->default(null)->change();
    });
}

};
