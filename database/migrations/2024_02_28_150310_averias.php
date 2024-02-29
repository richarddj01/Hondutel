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

            $table->unsignedBigInteger('zona_id');
            $table->foreign('zona_id')->references('id')->on('zonas');
            $table->BigInteger('numero')->unsigned();
            $table->timestamps();
            $table->string('problema_presentado')->nullable();
            $table->time('hora_inicio')->nullable();
            $table->string('ubicacion_latitud')->nullable();
            $table->string('ubicacion_longitud')->nullable();
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
