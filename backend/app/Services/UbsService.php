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
        $records = [];
        foreach($csv->getRecords() as $linhas) {
            $records[] = array_combine($cabecalho, $linhas) ;
        }
        Ubs::insert($records);

        return true;
    }
}
