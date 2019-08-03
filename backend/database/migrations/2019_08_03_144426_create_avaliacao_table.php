<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvaliacaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliacao', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->bigInteger('ubs_id');
            $table->text('observacao');
            $table->float('tempo_atendimento');
            $table->boolean('foi_atendido');
            $table->boolean('houve_superlotacao');
            $table->boolean('faltou_cuidado_profissional');
            $table->boolean('dificuldade_acesso');
            $table->boolean('avaliacao_atendimento');

            #WIP Definir campos da pesquisa

            $table->foreign('ubs_id', 'fk_ubs')->references('gid')->on('ubs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('avaliacao');
    }
}
