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
        Schema::create('projeto_comentarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('projeto_id')->constrained()->onDelete('cascade');
            $table->text('comentario');
            $table->string('pessoa');           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projeto_comentarios');
    }
};
