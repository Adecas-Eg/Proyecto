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
        Schema::create('casas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('tipo_oferta');
            $table->string('tipo_inmueble');
            $table->string('estrato');
            $table->string('direccion');
            $table->string('departamento');
            $table->string('ciudad');
            $table->string('descripcion');
            $table->string('baños');
            $table->string('parqueaderos');
            $table->string('pisos');
            // $table->foreign('') iinvestigar bien como son las referencias en laravel
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('casas');
    }
};
