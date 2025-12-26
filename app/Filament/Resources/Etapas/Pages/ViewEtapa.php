<?php

namespace App\Filament\Resources\Etapas\Pages;

use App\Filament\Resources\Etapas\EtapaResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewEtapa extends ViewRecord
{
    protected static string $resource = EtapaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
