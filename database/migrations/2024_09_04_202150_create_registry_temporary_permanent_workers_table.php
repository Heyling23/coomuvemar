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
        Schema::create('registry_temporary_permanent_workers', function (Blueprint $table) {
            $table->id();
            $table->string('nombres_apellidos');
            $table->string('sexo');
            $table->string('cedula');
            $table->boolean('es_temporal');
            $table->integer('numero_dias_trabajados_mes');
            $table->integer('numero_dias_trabajados_anio');
            $table->foreignId('general_data_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registry_temporary_permanent_workers');
    }
};
