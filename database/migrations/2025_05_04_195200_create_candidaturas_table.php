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
        Schema::create('candidaturas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vaga_id'); 
            $table->unsignedBigInteger('candidato_id');
            $table->string('status')->default('aplicado');
            $table->dateTime('data_aplicacao')->useCurrent();
            $table->timestamps();

            // relacionamentos | chaves estrangeiras
            $table->foreign('vaga_id')->references('id')->on('vagas')->onDelete('cascade');
            $table->foreign('candidato_id')->references('id')->on('candidatos')->onDelete('cascade');

            // restrições de unicidade
            $table->unique(['vaga_id', 'candidato_id'], 'vaga_candidato_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidaturas');
    }
};
