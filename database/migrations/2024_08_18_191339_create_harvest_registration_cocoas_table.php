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
        Schema::create('harvest_registration_cocoas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->integer('cantidad_mazorcas');
            $table->float('qq_baba_cacao');
            $table->float('precio_qq');
            $table->foreignId('general_data_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('harvest_registration_cocoas');
    }
};
