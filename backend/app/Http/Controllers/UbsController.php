<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Exceptions\FalhaObterException;
use App\Http\Requests\UbsGetRequest;
use App\Services\AvaliacaoService;
use App\Services\CnesService;
use App\Services\UbsService;
use Illuminate\Http\Response;

class UbsController extends Controller
{
    private $ubsService;
    private $cnesService;
    private $avaliacaoService;

    public function __construct()
    {
        $this->ubsService       = new UbsService();
        $this->cnesService      = new CnesService();
        $this->avaliacaoService = new AvaliacaoService();
    }

    public function get(UbsGetRequest $request)
    {
        try {
            $ubs            = $this->ubsService->getValuesFilters($request->all());
            $unidade        = $this->cnesService->getUnidadeByCodCnes($ubs->co_cnes);
            $funcionarios   = $this->cnesService->getProfissionaisByUnidadedId($unidade['id']);
            $dadosAvaliacao = $this->avaliacaoService->getDadosAvaliacoes($ubs->gid);

            return [
                'unidade'          => $ubs,
                'avaliacao'        => $dadosAvaliacao,
                'qtd_funcionarios' => count($funcionarios)

            ];
        } catch (FalhaObterException $exception) {
            return response()->json(['mensagem' => $exception->getMessage()], Response::HTTP_NOT_FOUND);
        } catch (\Exception $exception) {
            return response()->json(['mensagem' => $exception->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getHome()
    {
        try {
            return $this->avaliacaoService->getHomeValues();
        } catch (FalhaObterException $exception) {
            return response()->json(['mensagem' => $exception->getMessage()], Response::HTTP_NOT_FOUND);
        } catch (\Exception $exception) {
            return response()->json(['mensagem' => $exception->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
