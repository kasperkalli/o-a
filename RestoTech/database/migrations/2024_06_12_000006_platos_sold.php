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
        Schema::create('platos_sold', function (Blueprint $table) {
            $table->foreignId('ticket_id')->constrained('ticket');
            $table->foreignId('plato_id')->constrained('platos');
            $table->integer('quantity') -> default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('platos_sold');
    }
};
