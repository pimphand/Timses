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
        Schema::create('data_recaps', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('tps_id')->constrained('tps');
            $table->foreignId('user_id')->constrained('users');
            $table->char('village', 15);
            $table->char('district', 15);
            $table->integer('data_valid');
            $table->integer('data_invalid');
            $table->integer('data_total');
            $table->string('photo_1')->nullable();
            $table->string('photo_2')->nullable();
            $table->string('photo_3')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_recaps');
    }
};
