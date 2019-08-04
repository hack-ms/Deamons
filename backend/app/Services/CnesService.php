<?php

namespace App\Services;

use App\Avaliacao;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;

class CnesService
{
    public function getProfissionaisByCodCnes($codCnes): array
    {
        $guzzleClient = new Client();

        try {
            $resUnidade = $guzzleClient->get("http://cnes.datasus.gov.br/services/estabelecimentos?cnes=$codCnes", [
                'headers' => [
                    'referer' => "http://cnes.datasus.gov.br/pages/estabelecimentos/consulta.jsp"
                ]
            ]);

            $unidade = json_decode($resUnidade->getBody(), true)[0];

            $resFuncionarios = $guzzleClient->get("http://cnes.datasus.gov.br/services/estabelecimentos-profissionais/" . $unidade['id'], [
                'headers' => [
                    'referer' => "http://cnes.datasus.gov.br/pages/estabelecimentos/ficha/profissionais-ativos/" . $unidade['id']
                ]
            ]);

            $funcionarios = json_decode($resFuncionarios->getBody(), true);
        } catch (\Exception | GuzzleException $exception) {
            throw new \Exception('Falha ao buscar dados de funcionarios' . $exception->getMessage());
        }

        return $funcionarios;
    }
}
