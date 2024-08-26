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
        Schema::create('salat_times', function (Blueprint $table) {
            $table->id();
            $table->time('fajr');
            $table->time('dhuhr');
            $table->time('asr');
            $table->time('maghrib');
            $table->time('isha');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salat_times');
    }
};
