<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lotes', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_recepcion')->unique();

            $table->string('especie_fruta');
            $table->string('variedad_fruta');
            $table->string('calibre')->nullable();
            $table->string('calidad')->nullable();
            $table->string('agricola_nombre');
            $table->string('huerto_origen');
            $table->string('lote_origen');

            $table->dateTime('fecha_recepcion');
            $table->string('recepcion_nombre');
            $table->string('inspector_nombre')->nullable();
            $table->string('numero_guia')->unique();
            $table->string('archivo_guia')->nullable();

            $table->string('empresa_transporte');
            $table->string('conductor_nombre');
            $table->integer('km_recorridos');

            $table->string('tipo_envase_recepcion');
            $table->integer('cantidad_envases_recepcion');

            $table->decimal('kilos_recibidos', 10, 2);
            $table->decimal('kilos_aprobados', 10, 2)->default(0);
            $table->decimal('kilos_retenidos', 10, 2)->default(0);
            $table->decimal('porcentaje_merma', 5, 2)->default(0);

            $table->string('destino_fruta')->nullable();

            $table->integer('valor_fruta_kilo_clp');
            $table->integer('valor_flete_clp');
            $table->integer('costo_packing_clp');

            $table->decimal('tipo_cambio_aplicado', 8, 2)->nullable();

            $table->date('fecha_proforma')->nullable();
            $table->string('estado_pago')->default('Pendiente');
            $table->string('estado')->default('Esperando Calidad');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lotes');
    }
};
