<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\UbsService;
use App\Ubs;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Exceptions\FalhaObterException;
use Illuminate\Http\Response;

class UbsController extends Controller
{
    private $ubsService = null;

    public function __construct()
    {
        $this->ubsService = new UbsService();
    }

    public function get(Request $request): ?Collection
    {
        try {
            return $this->ubsService->getValuesFilters($request->all());
        } catch (\Exception $exception) {
            return response()->json(['mensagem' => $exception->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
