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
        Schema::table('services', function (Blueprint $table) {
            // "para qué sirve" (subtítulo del plan) — lo separamos de description
            $table->string('tagline')->nullable()->after('title');
            // Lista de beneficios, uno por línea (texto simple, fácil de editar)
            $table->text('features')->nullable()->after('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['tagline', 'features']);
        });
    }
};
