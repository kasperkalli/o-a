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
        Schema::create('platos_vendidos', function (Blueprint $table) {
            $table->foreignId('id_boleta')->constrained('boleta');
            $table->foreignId('id_plato')->constrained('platos');
            $table->integer('cantidad') -> default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('platos_vendidos');
    }
};
