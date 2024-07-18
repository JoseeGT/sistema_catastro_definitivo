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
        Schema::create('unificaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lote_original_id')->constrained('inmuebles');
            $table->foreignId('lote_dividido_id')->constrained('inmuebles');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unificaciones');
    }
};
