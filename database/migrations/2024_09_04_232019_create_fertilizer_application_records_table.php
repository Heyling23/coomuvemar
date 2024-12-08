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
        Schema::create('fertilizer_application_records', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_fertilizante');
            $table->enum('lugar_aplicacion', ['Suelo', 'Follaje'])->default('Suelo');
            $table->enum('tipo_insumo', ['Quimico', 'Organico'])->default('Quimico');
            $table->string('procedencia_fertilizante');
            $table->float('dosis_planta');
            $table->float('dosis_manzana');
            $table->integer('veces_aplicado_anio');
            $table->foreignId('general_data_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fertilizer_application_records');
    }
};
