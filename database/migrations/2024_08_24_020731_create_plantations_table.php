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
        Schema::create('plantations', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_poda');
            $table->integer('numero_plantas_podadas');
            $table->date('fecha_podada');
            $table->float('mz_area_podada');
            $table->enum('tipo_plantacion', ['Hibrida Adulta', 'Policlonal', 'Hibridas de desarrollo'])->default('Hibrida Adulta');
            $table->foreignId('general_data_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plantations');
    }
};
