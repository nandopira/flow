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
        Schema::create('projetos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nome');
            $table->string('setorResponsavel');
            $table->string('demandante');
            $table->text('descricao')->nullable();
            $table->date('dtprevini')->nullable();
            $table->date('dtprevfim')->nullable();
            $table->date('dtini')->nullable();
            $table->date('dtfim')->nullable();
            $table->decimal('orcamentoEstimado', 15, 2)->nullable();
            $table->string('projectManager')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projetos');
    }
};
