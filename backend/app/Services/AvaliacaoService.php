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

    public function getDadosAvaliacoes($ubsId): array
    {
        $avaliacoes = Avaliacao::where('ubs_id', $ubsId)->get();

        return [
            'qtd_avaliacoes'       => $avaliacoes->count(),
            'media_espera'         => '',
            'media_avaliacao'      => '',
            'principal_frustracao' => ''

        ];
    }
}
