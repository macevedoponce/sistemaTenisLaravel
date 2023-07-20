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
        Schema::create('resultados', function (Blueprint $table) {
            $table ->engine="InnoDB";
            $table->bigIncrements('id');
            $table->bigInteger('partido_id')->unsigned();
            $table->bigInteger('set_numero');
            $table->bigInteger('resultado_jugador1');
            $table->bigInteger('resultado_jugador2');
            $table->bigInteger('ganador');
            $table->timestamps();

            $table->foreign('partido_id')->references('id')->on('partidos')->onDelete("cascade");

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
