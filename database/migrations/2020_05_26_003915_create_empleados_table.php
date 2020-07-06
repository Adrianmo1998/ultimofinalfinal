<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('puesto_id')->references('id')->on('puesto');
            $table->foreignId('sexo_id')->references('id')->on('sexo');
            $table->string('nombre');
            $table->foreignId('nivel_id')->references('id')->on('nivel');
            $table->date('fecha_nacimiento');
            $table->string('descripcion_global')->nullable();
            $table->string('foto')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('empleados');
    }
}
