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
        Schema::create('curso_disciplina', function (Blueprint $table) {
             $table->unsignedBigInteger('curso_id')->unsigned()->nullable();
             $table->unsignedBigInteger('disciplina_id')->unsigned()->nullable();

             $table->foreign('curso_id')->references('id')->on('cursos')->delete('cascade');
             $table->foreign('disciplina_id')->references('id')->on('disciplinas')->delete('cascade');
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curso_disciplina');
    }
};
