<?php

use App\Models\Inmueble;
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
        Schema::create('codigos_catastrales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inmueble_id')->constrained()->onDelete('cascade');
            $table->string('sec',3);
            $table->string('man',3)->default('000');
            $table->string('par',3)->default('000');
            $table->string('sbp',3)->default('000');
            $table->string('niv',3)->default('000');
            $table->string('uni',3)->default('000');
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('codigos_catastrales');
    }
};
