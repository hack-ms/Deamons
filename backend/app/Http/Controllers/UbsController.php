<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\UbsService;
use App\Exceptions\FalhaObterException;
use Illuminate\Http\Response;

class UbsController extends Controller
{
    private $ubsService = null;

    public function __construct()
    {
        $this->ubsService = new UbsService();
    }

    public function get()
    {
        try {
            return $this->ubsService->getAll();
        } catch (FalhaObterException $exception) {
            return response()->json(['mensagem' => $exception->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
