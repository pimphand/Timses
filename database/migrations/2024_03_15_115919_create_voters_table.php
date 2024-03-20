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
        Schema::create('voters', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->bigInteger('nik')->unique()->index();
            $table->bigInteger('kk')->unique()->nullable();
            $table->string('tps')->nullable();
            $table->string('address')->nullable();
            $table->string('province')->nullable()->index();
            $table->string('city')->nullable()->index();
            $table->string('subdistrict')->index();
            $table->foreignId('village_id')->constrained(config('laravolt.indonesia.table_prefix').'villages');
            $table->string('phone')->nullable();
            $table->string('identity_card')->comment('KTP');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voters');
    }
};
