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
        //
        Schema::create('partidos', function (Blueprint $table) {
            $table ->engine="InnoDB";
            $table->bigIncrements('id');
            $table->bigInteger('campeonato_id')->unsigned();
            $table->bigInteger('categoria_id')->unsigned();
            $table->date('fechaPartido');
            $table->time('horaPartido');
            $table->bigInteger('jugador1_id')->unsigned();
            $table->bigInteger('jugador2_id')->unsigned();
            $table->bigInteger('numero_sets');
            $table->timestamps();
            $table->foreign('campeonato_id')->references('id')->on('campeonatos')->onDelete("cascade");
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete("cascade");
            $table->foreign('jugador1_id')->references('id')->on('participantes')->onDelete("cascade");
            $table->foreign('jugador2_id')->references('id')->on('participantes')->onDelete("cascade");

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
