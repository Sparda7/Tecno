<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDietasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dietas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idperfil');   
            $table->unsignedBigInteger('idtipoactividad');
            $table->date('fechainicio');
            $table->date('fechafin');
            $table->integer('caloriasdiarias');
            $table->decimal('pesoideal',8,2);
            $table->decimal('imc',8,2);
            $table->foreign('idperfil')->references('id')->on('perfils');
            $table->foreign('idtipoactividad')->references('id')->on('tipo_actividads');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dietas');
    }
}
