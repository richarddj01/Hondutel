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
        Schema::create('datos_tecnicos_telefonos', function (Blueprint $table) {
            $table->bigInteger('numero');
            $table->primary('numero');
            $table->integer('numero_de_enlace')->nullable();
            $table->unsignedBigInteger('zonas_id')->nullable();
            $table->foreign('zonas_id')->references('id')->on('zonas');
            //$table->central;
            //$table->status;
            $table->integer('numero_cable')->nullable();;
            $table->integer('armario')->nullable();
            $table->integer('par_primario')->nullable();;
            $table->integer('par_secundario')->nullable();;
            $table->string('caja_terminal',10)->nullable();
            $table->integer('borne')->nullable();
            $table->string('ruta',10)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datos_tecnicos_telefonos');
    }
};
