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
        Schema::create('participantes', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->string('dni');
            $table->string('apellidos_nombres');
            $table->date('fecha_nacimiento');
            $table->string('celular');
            $table->bigInteger('genero_id')->unsigned();
            $table->timestamps();

            $table->foreign('genero_id')->references('id')->on('generos')->onDelete("cascade");
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
