<?php

namespace App\Services;

use App\Ubs;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;
use League\Csv\Reader;
use mysql_xdevapi\Exception;

class UbsService
{
    public function importCsvFile(): bool
    {
        $file = Storage::get('ubs.csv');
        if (empty($file)) {
            return false;
        }
        $csv = Reader::createFromString($file);
        $csv->setHeaderOffset(0);
        $cabecalho = $csv->getHeader();
        foreach ($csv->getRecords() as $linhas) {
            Ubs::create(array_combine($cabecalho, $linhas));
        }
        return true;
    }

    public function getAll(): ?Collection
    {
        return Ubs::all();
    }

    /**
     * @param $request
     * @return mixed
     * @api
     * @host http://localhost:8000/api/ubs/filtro
     * @get
     * {
     * "co_cep":"768880011110",
     * "no_fantasia":"POSTO DE SAUDE DE FIGUEIRA DO OESTE",
     * "no_bairro":"POVOADO",
     * "co_banana":"maça"
     * }
     *
     * @return {
     *   {
     * "gid": 1,
     * "co_cnes": 2735180,
     * "lat": "-23.7792527675622",
     * "long": "-52.3512911796555",
     * "no_fantasia": "POSTO DE SAUDE DE FIGUEIRA DO OESTE",
     * "no_logradouro": "AVENIDA PIQUIRI",
     * "nu_endereco": "S\/N",
     * "no_bairro": "DISTRITO",
     * "nu_telefone": "(44)3533-1180",
     * "co_cep": "87270000",
     * "uf": "PR",
     * "cidade": "Engenheiro Beltrão"
     * }
     * }
     *
     * @throws \Exception
     */
    public function getValuesFilters($request): Ubs
    {
        try {
            return Ubs::where('no_fantasia', 'like', $request['busca'])
                ->orWhere('co_cep', $request['busca'])
                ->orWhere('no_bairro', $request['busca'])
                ->first();

        } catch (\Exception $exception) {
            throw new \Exception('UBS nao encontrada' . $exception->getMessage());
        }
    }
}
