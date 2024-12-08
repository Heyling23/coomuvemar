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
        Schema::create('integrated_pest_management_activities', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_apellido_aplicador');
            $table->string('plaga_enfermedad');
            $table->integer('nivel_danio');
            $table->string('metodo_aplicado');
            $table->string('hora_aplicacion');
            $table->string('duracion_dias_metodo_aplicado');
            $table->string('resultado_aplicacion');
            $table->foreignId('general_data_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('integrated_pest_management_activities');
    }
};
