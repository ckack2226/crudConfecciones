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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained('clientes');
            $table->dateTime('fecha_del_pedido');
            $table->dateTime('fecha_del_entrega');
            $table->text('descripcion_del_pedido');
            $table->integer('cantidad_del_pedido');
            $table->text('descripcion_de_abono');
            $table->decimal('Abonado', 10, 2);
            $table->decimal('total_del_pedido', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};

