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
        $avaliacoes            = Avaliacao::where('ubs_id', $ubsId)->get();
        $totalAvaliacoes       = $avaliacoes->count();
        $somaAvaliacoes        = 0;
        $mediaAvaliacoes       = 0;
        $mediaTempoAtendimento = 0;
        $somaTempoAtendimento  = 0;
        $contadores            = [
            'faltaMaterial'     => 0,
            'superlotacao'      => 0,
            'dificuldadeAcesso' => 0
        ];

        $avaliacoes->each(function ($avaliacao) use (
            &$somaAvaliacoes,
            &$somaTempoAtendimento,
            &$contadores
        ) {
            $somaAvaliacoes       += $avaliacao->avaliacao_atendimento;
            $somaTempoAtendimento += $avaliacao->tempo_atendimento;

            if ($avaliacao->houve_superlotacao) {
                $contadores['superlotacao']++;
            }

            if ($avaliacao->dificuldade_acesso) {
                $contadores['DificuldadeAcesso']++;
            }

            if ($avaliacao->faltou_material) {
                $contadores['faltaMaterial']++;
            }
        });

        arsort($contadores);

        if ($totalAvaliacoes > 0) {
            $mediaAvaliacoes       = $somaAvaliacoes / $totalAvaliacoes;
            $mediaTempoAtendimento = $somaTempoAtendimento / $totalAvaliacoes;
        }

        return [
            'qtd_avaliacoes'       => $totalAvaliacoes,
            'media_espera'         => $mediaTempoAtendimento,
            'media_avaliacao'      => $mediaAvaliacoes,
            'principal_frustracao' => key($contadores)
        ];
    }

    public function getHomeValues(): array
    {

    }
}
