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
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->foreignId('id_person')
                ->constrained('people')
                ->onDelete('cascade'); // Exclui o grupo se a pessoa associada for excluída
            $table->timestamps(); // Adiciona colunas created_at e updated_at
            $table->softDeletes(); // Adiciona coluna deleted_at para exclusão lógica
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};
