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
        Schema::create('abonados-servicios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_abonado');
                $table->foreign('id_abonado')->references('id')->on('abonados');
            $table->unsignedBigInteger('id_servicio');
                $table->foreign('id_servicio')->references('id')->on('servicios');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abonados-servicios');
    }
};
