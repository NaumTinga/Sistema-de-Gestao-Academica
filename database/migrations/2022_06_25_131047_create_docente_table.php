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
        Schema::create('docentes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('dataNascimento');
            $table->string('morada');
            $table->string('naturalidade');
            $table->string('genero');
            $table->string('grauAcademico');
            $table->integer('nrTelefone');
            $table->string('email')->unique();
            $table->integer('disciplina_id')->nullable();
            $table->integer('curso_id')->nullable();
            $table->integer('bloco_id')->nullable();
            $table->integer('turma_id')->nullable();
            $table->string('areaCientifica')->nullable();
            $table->integer('categoria_id')->nullable();
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
        Schema::dropIfExists('docente');
    }
};
