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
        Schema::create('supplies_materials_purchase_records', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_producto');
            $table->string('unidad_medida');
            $table->integer('cantidad');
            $table->date('fecha_compra');
            $table->string('categoria');
            $table->float('costo_unitario');
            $table->float('costo_total');
            $table->foreignId('general_data_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplies_materials_purchase_records');
    }
};
