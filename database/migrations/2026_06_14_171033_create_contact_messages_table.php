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
        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();
            $table->string('name');                       // Nombre de quien contacta
            $table->string('email');                      // Su correo
            $table->string('subject')->nullable();        // Asunto (opcional)
            $table->text('message');                      // El mensaje
            $table->boolean('is_read')->default(false);   // ¿Ya lo leíste?
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_messages');
    }
};
