<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string("nome")->nullable(false);
            $table->string("descricao")->nullable(true);
            $table->decimal("preco", 12, 2)->nullable(false);
            $table->string("categoria")->nullable(false);
            $table->timestamp("data_criacao")->useCurrent();
            $table->timestamp("data_atualizacao")->useCurrentOnUpdate()->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};