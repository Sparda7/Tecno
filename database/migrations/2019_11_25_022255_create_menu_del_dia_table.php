<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenudelDiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menudeldia', function (Blueprint $table) {
            $table->bigIncrements('id');            
            $table->string('nombre',50);            
            $table->decimal('totalcaloria',8,2);
            $table->decimal('totalgrasa',8,2);
            $table->decimal('totalcarbohidrato',8,2);
            $table->decimal('totalproteina',8,2);
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
        Schema::dropIfExists('menudeldia');
    }
}
