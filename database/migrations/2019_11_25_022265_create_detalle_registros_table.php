<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleRegistrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalleregistros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idregistrom');
            $table->unsignedBigInteger('idmenu');
            $table->decimal('subcalorias',8,2);
            $table->decimal('subgrasa',8,2);
            $table->decimal('subcarbohidrato',8,2);
            $table->decimal('subproteina',8,2);
            $table->foreign('idregistrom')->references('id')->on('registromenu');
            $table->foreign('idmenu')->references('id')->on('menudeldia');
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
        Schema::dropIfExists('detalleregistros');
    }
}
