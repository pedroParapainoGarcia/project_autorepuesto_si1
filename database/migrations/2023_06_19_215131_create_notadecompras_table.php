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
        Schema::create('notadecompras', function (Blueprint $table) {
            $table->id();
            $table->string('nro_documento',10);
            $table->date('fecha');
            $table->decimal('costototal',9,2);

            $table->foreignId('id_proveedor')
            ->nullable()
            ->constrained('proveedores')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();

            $table->foreignId('id_usuario')
            ->nullable()
            ->constrained('users')
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
        Schema::dropIfExists('notadecompras');
    }
};
