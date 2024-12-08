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
        Schema::create('sampling_ones', function (Blueprint $table) {
            $table->id();
            $table->integer('numero_plantas_afectadas');
            $table->integer('numero_mazorcas_afectadas');
            $table->foreignId('pest_monitoring_record_diseases_beneficial_insects_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sampling_ones');
    }
};
