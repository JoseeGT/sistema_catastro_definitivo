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
        Schema::create('propietarios', function (Blueprint $table) {
            
            $table->id();
            $table->string('nombre');
            $table->enum('tipo_documento', ['V-', 'E-', 'J-', 'P-', 'G-']);
            $table ->string('documento');
            $table->enum('codigo_telefono', ['0414', '0424', '0412', '0416', '0243'])->nullable();
            $table->string('telefono')->nullable();
            $table->enum ('estado', ['ACTIVO', 'INACTIVO'])->default('ACTIVO');
            $table->timestamp('fecha_creacion')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('propietarios');
    }
};
