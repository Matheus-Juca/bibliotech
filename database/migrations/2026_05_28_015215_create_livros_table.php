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
        Schema::create('livros', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique(); // Código para identificação de cada livro
            $table->string('titulo');
            $table->string('autor');
            $table->date('tombamento');
            $table->string('categoria')->nullable();
            $table->integer('qtd_disponivel');  // Quantidade total de livros disponíveis por titulo.
            $table->integer('qtd_total');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livros');
    }
};
