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
        Schema::create('notasalidas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');                        
            $table->decimal('costototal',9,2);
            $table->foreignId('id_usuario')           
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
        Schema::dropIfExists('notasalidas');
    }
};
