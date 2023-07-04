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
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_repuesto')
            ->nullable()
            ->constrained('repuestos')
            ->cascadeOnUpdate()
            ->nullOnDelete();
            $table->foreignId('id_notadeventa')
            ->nullable()
            ->constrained('notadeventas')
            ->cascadeOnUpdate()
            ->nullOnDelete();
            $table->integer('cantidad');
            $table->decimal('subtotal',9,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_ventas');
    }
};
