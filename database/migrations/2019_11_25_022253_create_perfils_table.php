<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerfilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfils', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre',50);
            $table->string('apellido',100);            
            $table->date('fecha_nacimiento')->nullable();
            $table->decimal('altura',8,2);
            $table->decimal('peso',8,2);
            $table->string('sexo',50);
            $table->string('email',30);
            $table->string('password');
            $table->string('tipo',20);
            $table->boolean('estado')->default(0);
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
        Schema::dropIfExists('perfils');
    }
}
