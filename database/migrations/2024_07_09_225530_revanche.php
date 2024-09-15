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
        Schema::create('revanches', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('jogador_pedindo_id');
            $table->string('jogador_recebendo_id');
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
