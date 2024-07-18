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
        Schema::create('tareas', function (Blueprint $table) {
            
            $table->id();
            $table->string('titulo');
            $table->string('descripcion');
            $table->enum ('estado', ['Pendiente', 'En proceso', 'Finalizado'])->default('Pendiente');
            $table->unsignedBigInteger('asignado_por_id')->nullable();
            $table->unsignedBigInteger('asignado_a_id')->nullable();
            $table->timestamp('fecha_asignacion')->nullable();
            $table->timestamp('fecha_completada')->nullable();
            $table->foreign('asignado_por_id')->references('id')->on('users')->onDelete('set null'); //id
            $table->foreign('asignado_a_id')->references('id')->on('users')->onDelete('set null'); //id
            

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tareas');
    }
};
