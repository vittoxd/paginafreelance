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
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->string('name');                        // Nombre del solicitante
            $table->string('email');                       // Su correo
            $table->string('phone')->nullable();           // Teléfono (opcional)
            // Plan que le interesa. Si se borra el plan, la cotización queda
            // sin plan asociado (null) pero NO se elimina (nullOnDelete).
            $table->foreignId('service_id')->nullable()->constrained()->nullOnDelete();
            $table->string('budget')->nullable();          // Presupuesto estimado (opcional)
            $table->text('details');                       // Detalles de lo que necesita
            $table->string('status')->default('nuevo');    // nuevo | contactado | cerrado
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotes');
    }
};
