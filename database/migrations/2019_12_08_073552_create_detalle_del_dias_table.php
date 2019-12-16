<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleDelDiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalledeldias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idmenu');            
            $table->unsignedBigInteger('idalimento');
            $table->decimal('cantidad',8,2);
            $table->decimal('subcalorias',8,2);
            $table->decimal('subgrasa',8,2);
            $table->decimal('subcarbohidrato',8,2);
            $table->decimal('subproteina',8,2);            
            $table->foreign('idmenu')->references('id')->on('menudeldia');
            $table->foreign('idalimento')->references('id')->on('platillos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalledeldias');
    }
}
