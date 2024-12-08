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
        Schema::create('pesticide_application_records', function (Blueprint $table) {
            $table->id();
            $table->string('nombres_apellidos_aplicadores');
            $table->string('plaga_enfermedad');
            $table->string('nombre_producto');
            $table->date('fecha_aplicacion');
            $table->string('hora_aplicacion');
            $table->float('onzas_dosis_bombadas');
            $table->string('lugar_cultivo_producto_aplicado');
            $table->float('mz_area_producto_aplicado');
            $table->float('litros_total_volumen_aplicado');
            $table->foreignId('general_data_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesticide_application_records');
    }
};
