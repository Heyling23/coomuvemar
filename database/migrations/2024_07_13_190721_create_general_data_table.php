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
        Schema::create('general_data', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_productor');
            $table->string('codigo');
            $table->string('numero_cedula');
            $table->string('nombre_finca');
            $table->float('altura_nivel_mar');
            $table->string('ciclo_productivo');
            $table->string('coordenadas_area_cacao');
            $table->string('departamento');
            $table->string('municipio');
            $table->string('comunidad');
            $table->float('area_total_finca');
            $table->float('area_cacao');
            $table->float('produccion');
            $table->float('desarrollo');
            $table->string('variedades_cacao');
            $table->string('bosquejo_finca');
            $table->boolean('es_certificado');
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_data');
    }
};
