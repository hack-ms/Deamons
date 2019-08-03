<?php

namespace App\Services;

use App\Ubs;
use Illuminate\Support\Facades\Storage;
use League\Csv\Reader;

class UbsService
{
    public function lerUbsDoCsv()
    {
        $csv = Reader::createFromPath(Storage::get('ubs.csv'), 'r');
        $csv->setHeaderOffset(0);
        $cabecalho = $csv->getHeader();
        foreach($csv->getRecords() as $linhas) {
            Ubs::created(array_combine($cabecalho, $linhas));
        }
    }
}
