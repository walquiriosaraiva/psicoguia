<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paciente', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome')->nullable();
            $table->string('telefone_celular')->nullable();
            $table->string('telefone_fixo')->nullable();
            $table->string('email')->nullable();
            $table->unsignedInteger('id_forma_cobranca')->nullable();
            $table->decimal('valor', 12, 2)->nullable();
            $table->unsignedInteger('id_pacote')->nullable();
            $table->unsignedInteger('id_convenio')->nullable();
            $table->string('numero_cartao')->nullable();
            $table->date('data_expiracao')->nullable();
            $table->text('observacao')->nullable();
            $table->timestamps();
        });

        Schema::table('paciente', function (Blueprint $table) {
            $table->index('id_forma_cobranca');
            $table->foreign('id_forma_cobranca')->references('id')->on('forma_cobranca');

            $table->index('id_pacote');
            $table->foreign('id_pacote')->references('id')->on('pacote');

            $table->index('id_convenio');
            $table->foreign('id_convenio')->references('id')->on('convenio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('paciente');
    }
}
