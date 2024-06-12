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
        Schema::create('tarefas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('count');
            $table->string('superior')->nullable();
            $table->string('titulo');
            $table->string('descricao');
            $table->string('createdby');
            $table->string('tipo');
            $table->string('setor')->nullable();
            $table->string('status')->nullable();
            $table->string('situacao')->nullable();
            $table->string('categoria')->nullable();
            $table->date('dtprevini')->nullable();
            $table->date('dtprevfim')->nullable();
            $table->date('dtfim')->nullable();
            $table->date('dtini')->nullable();
            
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarefas');
    }
};
