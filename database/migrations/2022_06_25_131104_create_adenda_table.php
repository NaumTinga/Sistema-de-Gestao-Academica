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
        Schema::create('adendas', function (Blueprint $table) {
            $table->id();
            $table->string('observacao');
            $table->string('regime');
            $table->string('turno');
            $table->string('semestre');
            $table->string('disciplina_id')->nullable();
            $table->string('curso_id')->nullable();
            $table->string('turma_id')->nullable();
            $table->string('docente_id')->nullable();
            $table->string('funcionario_id')->nullable();
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
        Schema::dropIfExists('adendas');
    }
};
