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
        Schema::create('inmuebles_documentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inmueble_id')->constrained()->onDelete('cascade');
            
            $table->string('tipo_operacion')->nullable();
            $table->date('fecha')->nullable();
            $table->string('num')->nullable();
            $table->string('folio')->nullable();
            $table->string('protocolo')->nullable();
            $table->string('matricula')->nullable();
            $table->string('trimestre')->nullable();
            $table->string('observaciones')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inmuebles_documentos');
    }
};
