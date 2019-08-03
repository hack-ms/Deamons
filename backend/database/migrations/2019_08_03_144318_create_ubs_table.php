<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUbsTable extends Migration
{
    public function up()
    {
        Schema::create('ubs', function (Blueprint $table) {
            $table->bigInteger('gid')->primary();
            $table->integer('co_cnes');
            $table->string('lat', 100);
            $table->string('long', 100);
            $table->string('no_fantasia', 300);
            $table->string('no_logradouro', 300);
            $table->string('nu_endereco', 300);
            $table->string('no_bairro', 300);
            $table->string('nu_telefone', 300);
            $table->string('co_cep', 300);
            $table->string('uf', 300);
            $table->string('cidade', 300);
        });
    }

    public function down()
    {
        Schema::dropIfExists('ubs');
    }
}
