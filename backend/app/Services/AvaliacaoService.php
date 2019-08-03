<?php

namespace App\Services;

use App\Avaliacao;
use App\Exceptions\FalhaInserirException;

class AvaliacaoService
{
    public function save(array $data): Avaliacao
    {
        $avaliacao = new Avaliacao();
        $avaliacao->fill($data);

        try {
            $avaliacao->save();
        } catch (\Exception $exception) {
            throw new FalhaInserirException('Falha ao inserir avaliacao: ' . $exception->getMessage());
        }

        return $avaliacao;
    }
}
