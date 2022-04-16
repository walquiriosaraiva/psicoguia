<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepasseConvenioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repasse_convenio', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome')->nullable();
            $table->unsignedInteger('id_convenio')->nullable();
            $table->decimal('valor_repasse', 12, 2)->nullable();
            $table->timestamps();
        });

        Schema::table('repasse_convenio', function (Blueprint $table) {
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
        Schema::drop('repasse_convenio');
    }
}
