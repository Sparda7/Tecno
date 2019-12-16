<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registromenu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('iddieta');                          
            $table->decimal('totaldia',8,2);
            $table->date('fecha');
            $table->decimal('totalcaloria',8,2);
            $table->decimal('totalgrasa',8,2);  
            $table->decimal('totalcarbohidrato',8,2);  
            $table->decimal('totalproteina',8,2);              
            $table->foreign('iddieta')->references('id')->on('dietas');
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
        Schema::dropIfExists('registromenu');
    }
}
