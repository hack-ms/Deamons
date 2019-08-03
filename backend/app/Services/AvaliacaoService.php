<?php

namespace App\Services;

use App\Avaliacao;
use App\Exceptions\FalhaInserirException;
use Illuminate\Support\Fluent;

class AvaliacaoService
{
    public function save(array $data): Avaliacao
    {
        $data      = new Fluent($data);
        $avaliacao = new Avaliacao();

//        $atributtes[''] = [
//
//        ]

        $avaliacao->fill($data);

        try {
            $avaliacao->save();
        } catch (\Exception $exception) {
            throw new FalhaInserirException('Falha ao inserir avaliacao: ', $exception->getMessage());
        }

        return $avaliacao;
    }
}
