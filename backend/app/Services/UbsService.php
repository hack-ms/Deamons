<?php

namespace App\Services;

use App\Ubs;
use Illuminate\Support\Facades\Storage;
use League\Csv\Reader;

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
        foreach($csv->getRecords() as $linhas) {
            Ubs::create(array_combine($cabecalho, $linhas)) ;
        }
        return true;
    }
}
