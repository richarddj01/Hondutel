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
        Schema::create('personas', function (Blueprint $table) {
            //$table->bigIncrements('id');
            $table->bigInteger('identidad');
            $table->primary('identidad');
            $table->string('primer_nombre',15);
            $table->string('segundo_nombre',15)->nullable();
            $table->string('primer_apellido',15);
            $table->string('segundo_apellido',15)->nullable();
            $table->string('telefono',12)->nullable();
            $table->string('celular',12)->nullable();
            $table->string('correo',50)->nullable();
            $table->string('direccion',100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
