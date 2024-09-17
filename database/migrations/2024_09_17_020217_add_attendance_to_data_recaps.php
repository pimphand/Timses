<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('data_recaps', function (Blueprint $table) {
            $table->integer('attendance_total')->default(0)->after('data_total');
            $table->integer('absent')->default(0)->after('attendance_total');
            $table->integer('attendance')->default(0)->after('absent');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_recaps', function (Blueprint $table) {
            $table->dropColumn('attendance_total');
            $table->dropColumn('absent');
            $table->dropColumn('attendance');
        });
    }
};
