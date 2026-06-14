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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');                          // Nombre del servicio
            $table->string('slug')->unique();                 // URL amigable
            $table->text('description');                      // Qué incluye el servicio
            $table->string('icon')->nullable();               // Ícono Heroicon (ej: "heroicon-o-code-bracket")
            $table->decimal('price_from', 10, 2)->nullable(); // Precio "desde" (opcional)
            $table->boolean('is_featured')->default(false);   // ¿Destacado?
            $table->unsignedInteger('sort_order')->default(0); // Orden manual
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
