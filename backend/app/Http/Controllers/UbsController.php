<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Exceptions\FalhaObterException;
use App\Http\Requests\UbsGetRequest;
use App\Services\AvaliacaoService;
use App\Services\CnesService;
use App\Services\UbsService;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
                'ubs'               => $ubs,
                'avaliacao'         => $dadosAvaliacao,
                'qtd_funcionarios'  => count($funcionarios)

            ];
        } catch (NotFoundHttpException | FalhaObterException $exception) {
            return response()->json(['mensagem' => $exception->getMessage()], Response::HTTP_NOT_FOUND);
        } catch (\Exception $exception) {
            return response()->json(['mensagem' => $exception->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function get2(UbsGetRequest $request)
    {
        try {
            $ubs            = $this->ubsService->getValuesFiltersList($request->all())->toArray();
            foreach ($ubs as $key => $value) {
                $ubs[$key]['unidade'] =  $this->cnesService->getUnidadeByCodCnes($value['co_cnes']);
                $ubs[$key]['avaliacao'] =   $this->avaliacaoService->getDadosAvaliacoes($value['gid']);;
            }

            foreach ($ubs as $key => $value) {
                $ubs[$key]['funcionarios'] = $this->cnesService->getProfissionaisByUnidadedId($value['unidade']['id']);
            }

            return $ubs;

        } catch (NotFoundHttpException | FalhaObterException $exception) {
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
