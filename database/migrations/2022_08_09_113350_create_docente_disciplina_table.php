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
        Schema::create('docente_disciplina', function (Blueprint $table) {
            $table->unsignedBigInteger('docente_id')->unsigned()->nullable();
            $table->unsignedBigInteger('disciplina_id')->unsigned()->nullable();

            $table->foreign('docente_id')->references('id')->on('docentes')->delete('cascade');
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
        Schema::dropIfExists('docente_disciplina');
    }
};
