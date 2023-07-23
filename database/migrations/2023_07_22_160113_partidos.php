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
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->string('nombrePartido');
            $table->bigInteger('campeonato_id')->unsigned();
            $table->bigInteger('categoria_id')->unsigned();
            $table->bigInteger('jugador1_id')->unsigned(); // puede ser equipos o jugadores inscritos
            $table->bigInteger('jugador2_id')->unsigned();
            $table->date('fecha_partido');
            $table->time('hora_partido');
            $table->bigInteger('cancha');
            $table->timestamps();

            $table->foreign('campeonato_id')->references('id')->on('campeonatos')->onDelete("cascade");
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete("cascade");
            $table->foreign('jugador1_id')->references('id')->on('inscritos')->onDelete("cascade");
            $table->foreign('jugador2_id')->references('id')->on('inscritos')->onDelete("cascade");
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
