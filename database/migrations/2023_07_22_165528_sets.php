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
        Schema::create('sets', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->bigInteger('resultado_id')->unsigned();
            $table->bigInteger('numero_set');
            $table->bigInteger('inscrito_id')->unsigned();
            $table->bigInteger('resultado');
            
            $table->timestamps();

            $table->foreign('resultado_id')->references('id')->on('resultados')->onDelete("cascade");
            $table->foreign('inscrito_id')->references('id')->on('inscritos')->onDelete("cascade");
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
