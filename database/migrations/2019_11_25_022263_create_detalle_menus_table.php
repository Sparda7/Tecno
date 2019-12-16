<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idmenu');            
            $table->unsignedBigInteger('idalimento');
            $table->decimal('cantidad',8,2);
            $table->decimal('subcaloria',8,2);
            $table->decimal('subgrasa',8,2);
            $table->decimal('subcarbohidrato',8,2);
            $table->decimal('subproteina',8,2);            
            $table->foreign('idmenu')->references('id')->on('menus');
            $table->foreign('idalimento')->references('id')->on('platillos');
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
        Schema::dropIfExists('detalle_menus');
    }
}
