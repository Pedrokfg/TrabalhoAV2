<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tab', function (Blueprint $table) {
            $table->id();
            $table->string('nome',255);
            $table->string('sobrenome',255);
            $table->integer('cpf')->unsigned();
            $table->date('nasc');
            $table->string('email',255);
            $table->integer('telefoneP')->unsigned();
            $table->integer('telefoneS')->unsigned();
            $table->integer('rg')->unsigned();
            $table->string('orgE',255);
            $table->integer('valor')->unsigned();
            $table->integer('numeroRes',)->unsigned();
            $table->string('complemento',255);
            $table->string('logradouro',255);
            $table->string('bairro',255);
            $table->string('cidade',255);
            $table->string('uf',255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tab');
    }
}