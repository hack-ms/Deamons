<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    protected $table = 'avaliacao';
    protected $fillable = [
        'ubs_id',
        'observacao',
        'tempo_atendimento',
        'foi_atendido',
        'houve_superlotacao',
        'faltou_cuidado_profissional',
        'dificuldade_acesso',
        'avaliacao_atendimento',
        'faltou_material',
        'data_atendimento'
    ];
}
