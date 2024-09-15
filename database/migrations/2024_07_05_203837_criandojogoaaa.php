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
        Schema::create('jogos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('conteudo',9);
            $table->string('jogador1id');
            $table->string('jogador2id')->nullable();
            $table->string('jogador1lado')->nullable();
            $table->string('jogador2lado')->nullable();
            $table->string('proximavez')->nullable();
            $table->string('resultado')->nullable();
            $table->boolean('atual');
            $table->unsignedBigInteger('salaid');
            $table->foreign('salaid')->references('id')->on('salas');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
