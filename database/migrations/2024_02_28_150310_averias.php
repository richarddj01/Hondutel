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
        Schema::create('averias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->BigInteger('numero')->unsigned();
            $table->timestamps();
            $table->string('problema_presentado')->nullable();

            //usuario que crea el registro
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            //usuario (tecnico) que se hace cargo de la avería
            $table->unsignedBigInteger('user_id_tecnico')->nullable();
            $table->foreign('user_id_tecnico')->references('id')->on('users');

            $table->boolean('iniciado')->nullable();
            $table->time('hora_inicio')->nullable();
            $table->string('ubicacion_inicio')->nullable();
            $table->string('ubicacion_final')->nullable();
            $table->time('hora_finalizado')->nullable();
            $table->boolean('solucionado');
            $table->string('observacion')->nullable();
            $table->string('tecnicos_encargados')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('averias');
    }
};
