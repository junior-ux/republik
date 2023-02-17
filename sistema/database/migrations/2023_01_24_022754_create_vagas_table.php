<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vagas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string("titulo");
            $table->string("endereco");
            $table->integer("numero");
            $table->string("bairro");
            $table->string("cidade");
            $table->string("estado");
            $table->string("referencia");
            $table->string("descricao");
            $table->string("telefone");
            $table->string("email");
            $table->string("valor");
            $table->integer("qtd_homem");
            $table->integer("qtd_mulher");
            $table->boolean("mobiliado");
            $table->boolean("animal");
            $table->string("image");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vagas');
    }
};
