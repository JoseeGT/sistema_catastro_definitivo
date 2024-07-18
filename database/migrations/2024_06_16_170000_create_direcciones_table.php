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
        Schema::create('direcciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('calle1_id');
            $table->unsignedBigInteger('calle2_id')->nullable();
            $table->unsignedBigInteger('sector_id');
            $table->foreignId('inmueble_id')->constrained()->onDelete('cascade');
            $table->string('nota')->nullable();
            $table->string('numero_civico');
            
            $table->foreign('calle1_id')->references('id')->on('calles');
            $table->foreign('calle2_id')->references('id')->on('calles');
            $table->foreign('sector_id')->references('id')->on('sectores');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('direcciones');
    }
};
