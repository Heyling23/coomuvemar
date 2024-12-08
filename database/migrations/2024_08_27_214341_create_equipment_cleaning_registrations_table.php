<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Query\Expression;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('equipment_cleaning_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('actividad');
            $table->string('equipo');
            $table->date('fecha_uso');
            $table->json('productos_usados_limpiar_producto')->default(new Expression('(JSON_ARRAY())'));
            $table->foreignId('general_data_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipment_cleaning_registrations');
    }
};
