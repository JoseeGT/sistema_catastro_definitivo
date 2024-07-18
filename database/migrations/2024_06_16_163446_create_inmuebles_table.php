<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inmuebles', function (Blueprint $table) {
            $table->id();

            // area terreno
            $table->integer('area_terreno');
            $table->integer('area_construccion');
            // area terreno sd
            $table->integer('area_terreno_sd')->nullable();
            $table->integer('area_construccion_sd')->nullable();
            // tenencia terreno
            $table->unsignedBigInteger('tenencia_terreno_id')->nullable();
            $table->foreign('tenencia_terreno_id')->references('id')->on('tenencias_terrenos')->onDelete('set null');
            // tipo construccion
            $table->unsignedBigInteger('tipo_construccion_id')->nullable();
            $table->foreign('tipo_construccion_id')->references('id')->on('tipos_construccion')->onDelete('set null');
            //propietario
            $table->unsignedBigInteger('propietario_id');
            $table->foreign('propietario_id')->references('id')->on('propietarios')->onDelete('cascade');
            //plano
            $table->string('plano_path')->nullable();
            // linderos
            $table->string('Lindero_norte')->nullable();
            $table->string('Lindero_sur')->nullable();
            $table->string('Lindero_este')->nullable();
            $table->string('Lindero_oeste')->nullable();    
            $table->enum ('estado', ['ACTIVO', 'INACTIVO', 'UNIFICACION INACTIVA', 'DIVISION INACTIVA'])->default('ACTIVO');
            $table->timestamp('fecha_creacion')->useCurrent();});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inmuebles');
    }
};
