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
        Schema::create('averia_inventarios', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('averia_id');
            $table->foreign('averia_id')->references('id')->on('averias');
            $table->unsignedInteger('inventario_id');
            $table->foreign('inventario_id')->references('id')->on(('inventarios'));
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
        Schema::dropIfExists('averia-inventarios');
    }
};
