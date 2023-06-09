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
        Schema::create('repuestos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_nombrerepuesto')
            ->nullable()
            ->constrained('nombrerepuestos')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
           
            $table->string('descripcion',75);
            $table->decimal('precioventa',9,2);
            $table->integer('stock');
            
            $table->foreignId('id_categoria')
            ->nullable()
            ->constrained('categorias')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            
            $table->foreignId('id_modelo')
            ->nullable()
            ->constrained('modelos')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();

            $table->foreignId('id_año')
            ->nullable()
            ->constrained('años')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();

            $table->foreignId('id_estantes')
            ->nullable()
            ->constrained('estantes')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repuestos');
    }
};
