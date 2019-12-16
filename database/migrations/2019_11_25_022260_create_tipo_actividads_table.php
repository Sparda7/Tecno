<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoActividadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_actividads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idactividadfisica');                            
            $table->string('tipoactividad',500);              
            $table->foreign('idactividadfisica')->references('id')->on('actividad_fisicas');                        
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
        Schema::dropIfExists('tipo_actividads');
    }
}
