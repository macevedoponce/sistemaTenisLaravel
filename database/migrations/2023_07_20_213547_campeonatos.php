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
        Schema::create('campeonatos', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->string('nombreCampeonato');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->bigInteger('tipo_campeonato_id')->unsigned();
            $table->timestamps();

            $table->foreign('tipo_campeonato_id')->references('id')->on('tipo_campeonatos')->onDelete("cascade");
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
