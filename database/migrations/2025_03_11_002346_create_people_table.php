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
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('cpfcnpj', 18)->unique();
            $table->timestamps(); // Adiciona created_at e updated_at
            $table->softDeletes(); // Adiciona deleted_at para exclusão lógica (opcional)
            
            // Define charset e collation (opcional, dependendo do banco de dados)
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};
