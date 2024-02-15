<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Unique;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('abonados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('identidad');
            $table->bigInteger('numero');

            $table->unsignedBigInteger('tipo_servicios_id');
            $table->foreign('tipo_servicios_id')->references('id')->on('tipo_servicios');

            $table->timestamps();
            $table->index(['identidad', 'numero'])->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abonados');
    }
};
