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
        Schema::create('candidates', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->index();
            $table->string('mission')->nullable()->index();
            $table->string('vision')->nullable()->index();
            $table->string('photo')->nullable()->nullable();
            $table->string('phone')->nullable();
            $table->string('biodata')->nullable()->index();
            $table->string('vice_name')->index();
            $table->string('vice_photo')->nullable()->nullable();
            $table->string('vice_vision')->nullable()->index();
            $table->string('vice_mission')->nullable()->index();
            $table->string('vice_phone')->nullable();
            $table->string('vice_biodata')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
