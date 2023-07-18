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
        Schema::create('detallesalidas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_notasalida')        
            ->constrained('notasalidas')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();

            $table->foreignId('id_repuestos')
            ->constrained('repuestos')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();

            $table->string("codigoRepuesto");            
            $table->integer('cantidad');
            $table->decimal('costounitario',9,2);
            $table->decimal('subtotal',9,2);          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detallesalidas');
    }
};
