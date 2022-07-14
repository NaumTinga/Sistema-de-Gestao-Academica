<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adenda', function (Blueprint $table) {
            $table->id();
            $table->string('observacao');
            $table->string('regime');
            $table->string('turno');
            $table->string('semestre');
            $table->string('docente_id');
            $table->string('funcionario_id');
            $table->date('dataAlteracao');
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
        Schema::dropIfExists('adenda');
    }
};
