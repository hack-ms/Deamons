<?php

declare(strict_types=1);

namespace App\Services;


class FiltersValidateRequest
{
    static $filtersObs = [
        'co_cep' => true,
        'no_fantasia' => true,
        'no_bairro' => true
    ];
    static function validadeObs(array $request): array
    {
        $filter = array_intersect_key($request, self::$filtersObs);
        return $filter;
    }
}
