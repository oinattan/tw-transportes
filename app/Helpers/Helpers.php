<?php

namespace App\Helpers;

use App\Models\Frete;
use Illuminate\Support\Str;

class Helpers
{
    static public function geraCodRastreioUnico(): string
    {

        do {
            $codigo = "BR" . Str::upper(Str::random(8));

            $existeCodigo = Frete::where('codigo_rastreio', $codigo)->exists();

        } while ($existeCodigo);

        return $codigo;
    }
}
