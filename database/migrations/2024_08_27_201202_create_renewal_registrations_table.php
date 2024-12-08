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
        Schema::create('renewal_registrations', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_injertacion');
            $table->integer('numero_plantas_injertada_por_mz');
            $table->json('nombre_clones_injertados');
            $table->string('nombre_proveedor');
            $table->foreignId('general_data_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('renewal_registrations');
    }
};
