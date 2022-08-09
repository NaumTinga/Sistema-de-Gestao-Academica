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
        Schema::create('adenda_turma', function (Blueprint $table) {
            $table->unsignedBigInteger('adenda_id')->unsigned()->nullable();
            $table->unsignedBigInteger('turma_id')->unsigned()->nullable();

            $table->foreign('adenda_id')->references('id')->on('adendas')->delete('cascade');
            $table->foreign('turma_id')->references('id')->on('turmas')->delete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adenda_turma');
    }
};
