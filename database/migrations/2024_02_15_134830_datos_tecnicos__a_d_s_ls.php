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
        Schema::create('datos_tecnicos_adsls', function (Blueprint $table) {
            $table->bigInteger('numero');
            $table->primary('numero');
            $table->unsignedBigInteger('zonas_id');
            $table->foreign('zonas_id')->references('id')->on('zonas');
            $table->integer('codigo_pots')->nullable();
            $table->integer('codigo_puerto_pots')->nullable();
            $table->integer('codigo_adsl')->nullable();
            $table->integer('codigo_puerto_adsl')->nullable();
            $table->integer('par_primario')->nullable();
            $table->integer('par_secundario')->nullable();
            $table->integer('cable')->nullable();
            $table->integer('armario')->nullable();
            $table->string('nodo')->nullable();
            $table->string('velocidad')->nullable();
            $table->string('ip_publica',15)->nullable();
            $table->string('caja_terminal',10)->nullable();
            $table->string('borne')->nullable();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datos_tecnicos_adsl');
    }
};
