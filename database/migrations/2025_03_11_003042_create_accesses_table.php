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
        Schema::create('accesses', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('rust_id', 15)->unique();
            $table->string('password', 255);
            $table->foreignId('id_person')
                ->constrained('people')
                ->onDelete('cascade'); // Exclusão em cascata
            $table->foreignId('id_group')
                ->constrained('groups')
                ->onDelete('cascade'); // Exclusão em cascata
            $table->timestamps(); // Adiciona created_at e updated_at
            $table->softDeletes(); // Adiciona deleted_at para exclusão lógica
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accesses');
    }
};
