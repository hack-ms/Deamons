<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubs extends Model
{
    protected $primaryKey = 'gid';
    protected $table = 'ubs';
    protected $fillable = [
        'gid',
        'co_cnes',
        'lat',
        'long',
        'no_fantasia',
        'no_logradouro',
        'nu_endereco',
        'no_bairro',
        'nu_telefone',
        'co_cep',
        'uf',
        'cidade'
    ];
    public $timestamps = false;
}
