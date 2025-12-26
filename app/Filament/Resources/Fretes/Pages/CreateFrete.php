<?php

namespace App\Filament\Resources\Fretes\Pages;

use App\Enums\FreteStatus;
use App\Filament\Resources\Fretes\FreteResource;
use App\Helpers\Helpers;
use Filament\Resources\Pages\CreateRecord;

class CreateFrete extends CreateRecord
{
    protected static string $resource = FreteResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['codigo_rastreio'] = Helpers::geraCodRastreioUnico();
        $data['status'] = FreteStatus::EM_TRANSITO;

        return $data;
    }
}
