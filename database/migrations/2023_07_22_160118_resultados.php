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
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->bigInteger('partido_id')->unsigned();
            $table->bigInteger('ganador_id')->unsigned();
            $table->bigInteger('perdedor_id')->unsigned();
            
            $table->timestamps();

            $table->foreign('partido_id')->references('id')->on('partidos')->onDelete("cascade");
            $table->foreign('ganador_id')->references('id')->on('inscritos')->onDelete("cascade");
            $table->foreign('perdedor_id')->references('id')->on('inscritos')->onDelete("cascade");
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
