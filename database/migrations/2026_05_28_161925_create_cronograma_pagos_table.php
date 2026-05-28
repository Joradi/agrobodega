<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cronograma_pagos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('lote_id')->constrained('lotes')->onDelete('cascade');

            $table->string('tipo_cuota');
            $table->date('fecha_vencimiento');

            $table->integer('monto_clp_estimado');
            $table->decimal('monto_usd_estimado', 10, 2);
            $table->decimal('tipo_cambio_aplicado', 8, 2);

            $table->string('estado')->default('Por Pagar');

            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('cronograma_pagos');
    }
};
