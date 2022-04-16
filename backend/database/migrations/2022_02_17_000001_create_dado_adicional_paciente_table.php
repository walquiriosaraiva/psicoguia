<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDadoAdicionalPacienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dado_adicional_paciente', function (Blueprint $table) {
            $table->increments('id');
            $table->string('data_nascimento')->nullable();
            $table->string('sexo')->nullable();
            $table->string('nome_social')->nullable();
            $table->string('cpf')->nullable();
            $table->string('rg')->nullable();
            $table->string('cep')->nullable();
            $table->string('rua')->nullable();
            $table->string('numero')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->string('uf')->nullable();
            $table->integer('ibge')->nullable();
            $table->string('complemento')->nullable();
            $table->string('naturalidade')->nullable();
            $table->string('profissao')->nullable();
            $table->string('nome_responsavel')->nullable();
            $table->string('cpf_responsavel')->nullable();
            $table->string('cobranca_responsavel', 1)->nullable();
            $table->string('nome_parente')->nullable();
            $table->string('telefone_parente')->nullable();
            $table->unsignedInteger('id_paciente')->nullable();
            $table->unsignedInteger('id_escolaridade')->nullable();
            $table->unsignedInteger('id_tag')->nullable();

            $table->timestamps();
        });

        Schema::table('dado_adicional_paciente', function (Blueprint $table) {
            $table->index('id_paciente');
            $table->foreign('id_paciente')->references('id')->on('paciente');

            $table->index('id_escolaridade');
            $table->foreign('id_escolaridade')->references('id')->on('escolaridade');

            $table->index('id_tag');
            $table->foreign('id_tag')->references('id')->on('tag');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('dado_adicional_paciente');
    }
}
