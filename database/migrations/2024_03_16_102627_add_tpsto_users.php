<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function ($table) {
            $table->uuid('tps_id')->nullable();
            $table->char('phone', 15)->nullable();
            $table->foreign('tps_id')->references('id')->on('tps')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function ($table) {
            $table->dropForeign(['tps_id']);
            $table->dropColumn(['tps_id', 'phone']);
        });
    }
};
