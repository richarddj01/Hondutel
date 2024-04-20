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
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('tipo_cliente_id');
                $table->foreign('tipo_cliente_id')->references('id')->on('tipo_clientes');
            $table->string('nombre',100);
            $table->string('apellido',50)->nullable();
            $table->string('direccion',200)->nullable();
            $table->string('telefono',12)->nullable();
            $table->string('celular',12)->nullable();
            $table->string('correo',50)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
