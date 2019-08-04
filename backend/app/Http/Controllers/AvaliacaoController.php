<?php

namespace App\Http\Controllers;

use App\Exceptions\FalhaInserirException;
use App\Http\Requests\AvaliacaoPostRequest;
use App\Services\AvaliacaoService;
use Illuminate\Http\Response;

class AvaliacaoController extends Controller
{
    private $avaliacaoService;

    public function __construct()
    {
        $this->avaliacaoService = new AvaliacaoService();
    }

    public function post(AvaliacaoPostRequest $request)
    {
        try {
            return $this->avaliacaoService->save($request->all());
        } catch (FalhaInserirException $exception) {
            return response()->json(['mensagem' => $exception->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
