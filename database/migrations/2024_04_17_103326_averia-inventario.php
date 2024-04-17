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
        Schema::create('averia-inventario', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('id_averia');
            $table->foreign('id_averia')->references('id')->on('averias');
            $table->unsignedInteger('id_inventario');
            $table->foreign('id_inventario')->references('id')->on(('inventario'));
            $table->float('cantidad');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('averia-inventario');
    }
};
