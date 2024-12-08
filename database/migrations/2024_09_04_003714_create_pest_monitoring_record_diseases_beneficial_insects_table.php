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
        Schema::create('pest_monitoring_record_diseases_beneficial_insects', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_monitoreo');
            $table->string('nombre_plaga_enfermedad');
            $table->integer('numero_plantas_afectadas_1');
            $table->integer('numero_mazorcas_afectadas_1');
            $table->integer('numero_plantas_afectadas_2');
            $table->integer('numero_mazorcas_afectadas_2');
            $table->foreignId('general_data_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pest_monitoring_record_diseases_beneficial_insects');
    }
};
