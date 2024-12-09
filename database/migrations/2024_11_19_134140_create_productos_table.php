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
        Schema::create('productos', function (Blueprint $table) {
            $table->id('id_producto');
            $table->string('nombre_producto')->unique();
            $table->decimal('precio_producto', 8, 2);
            $table->integer('stock_producto');
            $table->foreignId('fk_id_categoria')
                  ->constrained('categorias', 'id_categoria') // Especifica la clave primaria correcta
                  ->onDelete('cascade');
            $table->foreignId('fk_id_proveedor')
                  ->constrained('proveedors', 'id_proveedor') // Especifica la clave primaria correcta
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
