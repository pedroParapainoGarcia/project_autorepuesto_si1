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
        Schema::create('notadeventas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->string('descripcion',100);
            $table->decimal('costototal',9,2);
            $table->integer('notadepago');
            $table->foreignId('id_cliente')
            ->nullable()
            ->constrained('clientes')
            ->cascadeOnUpdate()
            ->nullOnDelete();

            $table->foreignId('id_usuario')
            ->nullable()
            ->constrained('users')
            ->cascadeOnUpdate()
            ->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notadeventas');
    }
};
