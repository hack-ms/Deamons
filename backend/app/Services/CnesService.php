<?php

namespace App\Services;

use App\Exceptions\FalhaObterException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class CnesService
{
    public function getUnidadeByCodCnes($codCnes): array
    {
        $guzzleClient = new Client();

        try {
            $resUnidade = $guzzleClient->get("http://cnes.datasus.gov.br/services/estabelecimentos?cnes=$codCnes", [
                'headers' => [
                    'referer' => "http://cnes.datasus.gov.br/pages/estabelecimentos/consulta.jsp"
                ]
            ]);

            $unidade = json_decode($resUnidade->getBody(), true);

            if (!count($unidade)) {
                throw new FalhaObterException('Unidade nao encontrada no sistema CNES:  ' . $codCnes);
            }
        } catch (GuzzleException $exception) {
            throw new \Exception('Falha ao buscar dados no CNES' . $exception->getMessage());
        }

        return current($unidade);
    }

    public function getProfissionaisByUnidadedId($idUbs): array
    {
        $guzzleClient = new Client();

        try {
            $resFuncionarios = $guzzleClient->get("http://cnes.datasus.gov.br/services/estabelecimentos-profissionais/" . $idUbs, [
                'headers' => [
                    'referer' => "http://cnes.datasus.gov.br/pages/estabelecimentos/ficha/profissionais-ativos/" . $idUbs
                ]
            ]);

            $funcionarios = json_decode($resFuncionarios->getBody(), true);

        } catch (GuzzleException $exception) {
            throw new \Exception('Falha ao buscar dados no CNES' . $exception->getMessage());
        }

        return $funcionarios;
    }
}
