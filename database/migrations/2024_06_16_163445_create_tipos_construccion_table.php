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
        Schema::create('tipos_construccion', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->decimal('tasa1', 8, 4);  // Hasta 8 dígitos en total, 4 de ellos decimales
            $table->decimal('tasa2', 8, 4);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipos_construccion');
    }
};
