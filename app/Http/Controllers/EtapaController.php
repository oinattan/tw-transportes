<?php

namespace App\Http\Controllers;

use App\Enums\FreteStatus;
use App\Http\Requests\StoreEtapaRequest;
use App\Models\Etapa;
use App\Models\Frete;
use Symfony\Component\HttpFoundation\JsonResponse;

class EtapaController extends Controller
{
    public function store(StoreEtapaRequest $request): Etapa|JsonResponse   
    {
        $frete = Frete::find($request->frete_id);

        if ($frete->status == FreteStatus::ENTREGUE){
            return response()->json([
                'message' => 'Não é possível adicionar etapas a um frete entregue.'
            ], 400);
        }

        $etapa = Etapa::create($request->all());
        
        $tipoFreteStatus = FreteStatus::fromName($request->tipo_etapa);
        $frete->update(['status' => $tipoFreteStatus]);

        return $etapa;
    }
}
