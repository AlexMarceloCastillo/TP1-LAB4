<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('denominacion',128);
            $table->string('telefono',50);
            $table->string('hs_atencion',256);
            $table->text('q_somos');                
            $table->decimal('latitud',8,2);                
            $table->decimal('longitud',8,2);                
            $table->string('domicilio',256);
            $table->string('email',75)->unique();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresa');
    }
}
