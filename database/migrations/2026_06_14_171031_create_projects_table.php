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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');                       // Nombre del proyecto
            $table->string('slug')->unique();              // URL amigable: /proyectos/mi-proyecto
            $table->string('summary');                     // Resumen corto (tarjetas)
            $table->text('description');                   // Descripción completa (detalle)
            $table->string('client')->nullable();          // Cliente para quien se hizo
            $table->string('tech_stack')->nullable();      // Tecnologías usadas (ej: "Laravel, Tailwind")
            $table->string('project_url')->nullable();     // Enlace al proyecto en vivo
            $table->string('image_path')->nullable();      // Ruta de la imagen de portada
            $table->boolean('is_featured')->default(false); // ¿Destacado en la portada?
            $table->date('completed_at')->nullable();      // Fecha de finalización
            $table->unsignedInteger('sort_order')->default(0); // Orden manual de aparición
            $table->timestamps();                          // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
