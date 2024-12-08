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
        Schema::create('cocoa_area_activities_registries', function (Blueprint $table) {
            $table->id();
            $table->string('actividad');
            $table->string('nombre_trabajador');
            $table->string('sexo');
            $table->string('cedula');
            $table->integer('dias_trabajados');
            $table->float('pago_dia');
            $table->float('pago_total');
            $table->float('pago_mensual');
            $table->date('fecha_pago');
            $table->string('firma');
            $table->foreignId('general_data_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cocoa_area_activities_registries');
    }
};
