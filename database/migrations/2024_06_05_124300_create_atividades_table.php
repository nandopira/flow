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
        Schema::create('atividades', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('projeto_uid');
            $table->string('titulo');
            $table->string('descricao')->nullable();
            $table->string('num_usp_autor');
            $table->string('num_usp_atribuido')->nullable();
            $table->date('dtprevfim')->nullable();
            $table->date('dtfim')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atividades');
    }
};
