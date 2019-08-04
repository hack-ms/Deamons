<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableAvaliacao6 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('avaliacao', function (Blueprint $table) {
            $table->text('observacao')->nullable()->change();
            $table->float('tempo_atendimento')->nullable()->change();
            $table->boolean('foi_atendido')->nullable()->change();
            $table->boolean('houve_superlotacao')->nullable()->change();
            $table->boolean('faltou_cuidado_profissional')->nullable()->change();
            $table->boolean('dificuldade_acesso')->nullable()->change();
            $table->integer('avaliacao_atendimento')->nullable()->change();;
            $table->boolean('faltou_material')->nullable()->change();
            $table->dateTime('data_atendimento')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
