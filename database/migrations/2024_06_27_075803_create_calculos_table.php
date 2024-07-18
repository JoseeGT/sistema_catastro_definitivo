<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('calculos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inmueble_id')->constrained();
            $table->decimal('impuesto_construccion', 8, 2)->nullable();
            $table->decimal('impuesto_terreno', 8, 2)->nullable();
            $table->decimal('descuento')->nullable();
            $table->boolean('acueducto')->nullable();
            $table->boolean('cloaca')->nullable();
            $table->boolean('ficha_catastral')->nullable();
            $table->boolean('art_91')->nullable();
            $table->boolean('solvencia')->nullable();
            $table->boolean('inspeccion')->nullable(); 
            $table->boolean('plano_mensura')->nullable();
            $table->decimal('sub_total', 8, 2)->nullable();
            $table->decimal('total', 8, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calculos');
    }
};
