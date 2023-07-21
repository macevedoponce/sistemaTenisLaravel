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
            $table ->engine="InnoDB";
            $table->bigIncrements('id');
            $table->string('dni');
            $table->string('apellidosNombres');
            $table->date('fecha_nacimiento');
            $table->bigInteger('genero_id')->unsigned();
            $table->string('num_celular');
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
