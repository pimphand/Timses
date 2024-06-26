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
        Schema::create('detail_data_recaps', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('data_recap_id')->constrained('data_recaps');
            $table->foreignUuid('candidate_id')->constrained('candidates');
            $table->integer('vote');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_data_recaps');
    }
};
